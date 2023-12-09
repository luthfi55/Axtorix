<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Applier;
use App\Models\Apply;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Job;
use App\Models\Recruiter;
use App\Models\User;
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
        \Carbon\Carbon::setLocale('id');
        $job = Job::findOrFail($jobId);
        $recruiter = Recruiter::where('id', $job->recruiter_id)->first();
        $user = User::where('id', $recruiter->user_id)->first();
        return view("applier/detailJobs", compact('job','recruiter', 'user'));
    }
    public function manageDetail($jobId){        
        $job = Job::findOrFail($jobId);  // This will find the job by its ID or fail (return 404 error) if not found.        
        $pendingAppliers = Apply::where('job_id', $jobId)->where('status', 'pending')->paginate(4);
        $acceptAppliers = Apply::where('job_id', $jobId)->where('status', 'accept')->paginate(4);
        $rejectAppliers = Apply::where('job_id', $jobId)->where('status', 'reject')->paginate(4);
        return view("recruiter/manageJobDetail", ["job"=> $job, "acceptAppliers" => $acceptAppliers, "pendingAppliers" => $pendingAppliers, "rejectAppliers" => $rejectAppliers]); // Note: I changed the view to `manageJobDetail` for clarity.
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
        session()->flash('success', 'Lowongan berhasil ditambahkan.');
        return redirect()->route('manager.post-job');
    }    

    public function userDetail($id){
        $applier = Applier::where('user_id', $id)->first();
        $education = Education::where('user_id', $id)->orderBy('start_date', 'asc')->get();
        $experience = Experience::where('user_id', $id)->orderBy('start_date', 'asc')->get();
        return view("recruiter/userDetail", compact('applier','education', 'experience'));
    }

    public function editProfile($id){
        if ( $id != Auth::user()->id ){
            return redirect("home");
        } else {
            $recruiter = Recruiter::where('user_id', $id)->first();
            return view("recruiter/editProfile", compact('recruiter'));
        }   
    }

    public function updateProfile(Request $request){
        $request->validate([            
            'name' => 'required',
            'description' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
            'address' => 'required',           
        ]);            

        $applier = Recruiter::findOrFail($request->id);        
        $applier->name = $request['name'];
        $applier->description = $request['description'];        
        $applier->phone_number = $request['phone_number'];        
        $applier->city = $request['city'];
        $applier->address = $request['address'];        
        $applier->save();     
        
        session()->flash('success', 'Profil berhasil diperbarui.');

        return redirect()->route('manager.edit-profile', Auth::user()->id);
    }
}
