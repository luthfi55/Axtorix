<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Applier;
use App\Models\Apply;
use App\Models\Job;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(){
        // return redirect()->route('manager.post-job');
        return view("recruiter/postJob");
    }
    public function manage(){
        \Carbon\Carbon::setLocale('id');
        $recruiter = Recruiter::where("user_id",Auth::id())->first();
        $jobs = Job::where('recruiter_id', $recruiter->id)->withCount('applies')->paginate(12);        
        return view("recruiter/manageJob", ["jobs"=> $jobs]);
    }

    public function jobDetail($jobId){
        $job = Job::findOrFail($jobId);
        return view("applier/detailJobs", ["job"=> $job]);
    }
    public function manageDetail($jobId){        
        $job = Job::findOrFail($jobId);  // This will find the job by its ID or fail (return 404 error) if not found.
        $applies = Apply::where('job_id', $jobId)->get();
        // foreach ($applies as $apply) {
        //     $applier_id = $apply->applier_id;            
        //     $applier = Applier::where('id', $applier_id)->get();
        //     // Do something with $applier_id
        // }
        // dd($applies);
        // $apply = Apply::where('job_id', $jobId)->first();
        // $applier_id = $apply->applier_id;                
        return view("recruiter/manageJobDetail", ["job"=> $job, "applies" => $applies]); // Note: I changed the view to `manageJobDetail` for clarity.
    }

    public function jobList(Request $request){
        \Carbon\Carbon::setLocale('id');
    
        if ($request->has('job_id')) {
            $selectedJobId = $request->input('job_id');
            // Simpan ID pekerjaan ke dalam sesi
            session(['selectedJobId' => $selectedJobId]);
            return redirect()->back();
        }
    
        // Ambil ID pekerjaan dari sesi (jika ada)
        $selectedJob = null;
        if (session()->has('selectedJobId')) {
            $selectedJob = Job::find(session('selectedJobId'));
            session()->forget('selectedJobId');  // Hapus ID pekerjaan dari sesi setelah digunakan
        }        

        $sort = $request->input('sort', 'desc');  // default adalah 'desc'
        $search = $request->input('search', '');  // parameter pencarian

        $query = Job::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")  // mencari berdasarkan nama pekerjaan
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('type', 'LIKE', "%{$search}%");  // atau berdasarkan deskripsi pekerjaan
            });
        }
        
        $types = $request->input('types', []);

        if ($types && !in_array('all', $types)) {
            $query->whereIn('type', $types);  // Filter by selected types
        }

        $allJobs = $query->orderBy('created_at', $sort)->paginate(9);

        $countAllJobs = Job::all()->count();
        $countFilmJobs = Job::all()->where('type', 'film')->count();
        $countShortFilmJobs = Job::all()->where('type', 'film-pendek')->count();
        $countTheaterJobs = Job::all()->where('type', 'teater')->count();
        $countAdvertisingJobs = Job::all()->where('type', 'iklan')->count();
        
        return view('applier/listJobs', [
            'allJobs' => $allJobs,    
            'selectedJob' => $selectedJob,
            'countAllJobs' => $countAllJobs,    
            'countFilmJobs' => $countFilmJobs,
            'countShortFilmJobs' => $countShortFilmJobs,
            'countTheaterJobs' => $countTheaterJobs,
            'countAdvertisingJobs' => $countAdvertisingJobs,
            'types' => $types,
        ]);        
    }

    public function create(Request $request){             
        $request->validate([
            'name' => 'required',
            'type' => 'required',            
            'description' => 'required',            
        ]);                          

        $recruiter = Recruiter::where('user_id', $request['recruiter_id'])->first();                             

        if (!$recruiter) {
            return response()->json(['error' => 'User not found'], 404);
        } else {
            $recruiterID = $recruiter->id;            
        }
        
        Job::create([
            'recruiter_id'=> $recruiterID,
            'name'=> $request['name'],
            'type'=> $request['type'],
            'description'=> $request['description'],
            'required_vidio' => $request['required_vidio'],
            'status'=> $request['status'],
        ]);
        
        return redirect()->route('manager.post-job');
    }    
}
