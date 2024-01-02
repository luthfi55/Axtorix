<?php

namespace App\Http\Controllers;

use App\Models\Applier;
use App\Models\Job;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        \Carbon\Carbon::setLocale('id');
        $recentFilmJobs = Job::where('type', 'film')->orderBy('created_at', 'desc')->take(4)->get();
        $recentShortFilmJobs = Job::where('type', 'film-pendek')->orderBy('created_at', 'desc')->take(4)->get();
        $recentTheaterJobs = Job::where('type', 'teater')->orderBy('created_at', 'desc')->take(4)->get();
        $recentAdvertisingJobs = Job::where('type', 'iklan')->orderBy('created_at', 'desc')->take(4)->get();
        $allJobs = Job::whereIn('type', ['film', 'film-pendek', 'teater', 'iklan'])->get();

        $countFilmJobs = $allJobs->where('type', 'film')->count();
        $countShortFilmJobs = $allJobs->where('type', 'film-pendek')->count();
        $countTheaterJobs = $allJobs->where('type', 'teater')->count();
        $countAdvertisingJobs = $allJobs->where('type', 'iklan')->count();
        if(auth()->check()){
            if (auth()->user()->role == 'user') {            
                $applier = Applier::where('user_id', Auth::id())->first();
                return view('home', [
                    'recentFilmJobs' => $recentFilmJobs, 
                    'recentShortFilmJobs' => $recentShortFilmJobs, 
                    'recentTheaterJobs' => $recentTheaterJobs, 
                    'recentAdvertisingJobs' => $recentAdvertisingJobs, 
                    'countFilmJobs' => $countFilmJobs,
                    'countShortFilmJobs' => $countShortFilmJobs,
                    'countTheaterJobs' => $countTheaterJobs,
                    'countAdvertisingJobs' => $countAdvertisingJobs,
                    'applier' => $applier
                ]);
            }
            if (auth()->user()->role == 'manager') {            
                $recruiterData = Recruiter::where('user_id', Auth::id())->first();
                return view('home', [
                    'recentFilmJobs' => $recentFilmJobs, 
                    'recentShortFilmJobs' => $recentShortFilmJobs, 
                    'recentTheaterJobs' => $recentTheaterJobs, 
                    'recentAdvertisingJobs' => $recentAdvertisingJobs, 
                    'countFilmJobs' => $countFilmJobs,
                    'countShortFilmJobs' => $countShortFilmJobs,
                    'countTheaterJobs' => $countTheaterJobs,
                    'countAdvertisingJobs' => $countAdvertisingJobs,
                    'recruiterData' => $recruiterData
                ]);
            }
        } 
        return view('home', [
            'recentFilmJobs' => $recentFilmJobs, 
            'recentShortFilmJobs' => $recentShortFilmJobs, 
            'recentTheaterJobs' => $recentTheaterJobs, 
            'recentAdvertisingJobs' => $recentAdvertisingJobs, 
            'countFilmJobs' => $countFilmJobs,
            'countShortFilmJobs' => $countShortFilmJobs,
            'countTheaterJobs' => $countTheaterJobs,
            'countAdvertisingJobs' => $countAdvertisingJobs
        ]);
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }
}
