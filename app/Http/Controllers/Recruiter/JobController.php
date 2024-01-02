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
        $recruiter = Recruiter::where("user_id", Auth::id())->first();
        return view("recruiter/postJob", compact('recruiter'));
    }
    public function manage(){
        \Carbon\Carbon::setLocale('id');
        $recruiter = Recruiter::where("user_id",Auth::id())->first();
        $jobs = Job::where('recruiter_id', $recruiter->id)->withCount('applies')->paginate(12);        
        return view("recruiter/manageJob", ["jobs"=> $jobs, "recruiter"=>$recruiter]);
    }

    public function jobDetail($jobId){
        \Carbon\Carbon::setLocale('id');
        if(auth()->check()){
            if (auth()->user()->role == 'manager') {     
                $recruiterData = Recruiter::where('user_id', Auth::id())->first();       
                $recruiter = Recruiter::where("user_id",Auth::id())->first();
                $jobs = Job::where('recruiter_id', $recruiter->id)->first();
                $job = Job::findOrFail($jobId);
                $recruiter = Recruiter::where('id', $job->recruiter_id)->first();
                $user = User::where('id', $recruiter->user_id)->first();
                
                return view("applier/detailJobs", compact('recruiterData', 'job', 'jobs','recruiter', 'user'));
            } else {
                $applier = Applier::where("user_id",Auth::id())->first();            
                $education = Education::where("user_id",Auth::id())->first();
                $job = Job::findOrFail($jobId);
                $recruiter = Recruiter::where('id', $job->recruiter_id)->first();
                $user = User::where('id', $recruiter->user_id)->first();
                
                if ($applier){
                    if ($applier->bio == null){
                        $checkProfile = false;
                    } else {
                        $checkProfile = true;
                    }
                    if ($applier->resume == null){
                        $checkResume = false;
                    } else {
                        $checkResume = true;
                    }                    
                    if ($education == null){
                        $checkEducation = false;
                    } else {
                        $checkEducation = true;
                    }
                }                
                
                return view("applier/detailJobs", compact('job', 'checkProfile', 'checkResume', 'checkEducation', 'applier','recruiter', 'user'));
            }                                  
        }  
        $job = Job::findOrFail($jobId);
        $recruiter = Recruiter::where('id', $job->recruiter_id)->first();
        $user = User::where('id', $recruiter->user_id)->first();
                
        return view("applier/detailJobs", compact('job','recruiter', 'user'));
    }

    public function manageDetail($jobId){        
        $job = Job::findOrFail($jobId);  // This will find the job by its ID or fail (return 404 error) if not found.        
        // Di Controller Anda
        $pendingAppliers = Apply::where('job_id', $jobId)->where('status', 'pending')->paginate(4, ['*'], 'pending_page');
        $acceptAppliers = Apply::where('job_id', $jobId)->where('status', 'accept')->paginate(4, ['*'], 'accept_page');
        $rejectAppliers = Apply::where('job_id', $jobId)->where('status', 'reject')->paginate(4, ['*'], 'reject_page');
        $recruiter = Recruiter::where("user_id",Auth::id())->first();
        return view("recruiter/manageJobDetail", ["job"=> $job, "recruiter"=> $recruiter, "acceptAppliers" => $acceptAppliers, "pendingAppliers" => $pendingAppliers, "rejectAppliers" => $rejectAppliers]); // Note: I changed the view to `manageJobDetail` for clarity.
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
        
        $applier = Applier::where('user_id', Auth::id())->first();
        $education = Education::where('user_id', Auth::id())->first();
        if ($applier){
            if ($applier->bio == null){
                $checkProfile = false;
            } else {
                $checkProfile = true;
            }
            if ($applier->resume == null){
                $checkResume = false;
            } else {
                $checkResume = true;
            }            
            if ($education == null){
                $checkEducation = false;
            } else {
                $checkEducation = true;
            }
        }
        if(auth()->check()){
        if (auth()->user()->role == 'user') {            
            return view('applier/listJobs', [
                'allJobs' => $allJobs,    
                'selectedJob' => $selectedJob,
                'countAllJobs' => $countAllJobs,    
                'countFilmJobs' => $countFilmJobs,
                'countShortFilmJobs' => $countShortFilmJobs,
                'countTheaterJobs' => $countTheaterJobs,
                'countAdvertisingJobs' => $countAdvertisingJobs,
                'applier' => $applier,
                'checkProfile' => $checkProfile,
                'checkResume' => $checkResume,
                'checkEducation' => $checkEducation,
                'types' => $types,
            ]);     
        }
        if (auth()->user()->role == 'manager') {            
            $recruiterData = Recruiter::where('user_id', Auth::id())->first();
            return view('applier/listJobs', [
                'allJobs' => $allJobs,    
                'selectedJob' => $selectedJob,
                'countAllJobs' => $countAllJobs,    
                'countFilmJobs' => $countFilmJobs,
                'countShortFilmJobs' => $countShortFilmJobs,
                'countTheaterJobs' => $countTheaterJobs,
                'countAdvertisingJobs' => $countAdvertisingJobs,
                'applier' => $applier,              
                'types' => $types,
                'recruiterData' => $recruiterData
            ]);     
        }        
    }

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
        $recruiter = Recruiter::where("user_id",Auth::id())->first();
        return view("recruiter/userDetail", compact('applier','education', 'experience', 'recruiter'));
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

    public function updatePicture(Request $request){
        $request->validate([
            'id' => 'required',
            'user_id' => 'required',
            'picture' => 'required',
        ]);    

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('recruiter_picture', $filename, 'public');
        }        

        $recruiter = Recruiter::findOrFail($request['id']);
        $recruiter->picture = $path;        
        $recruiter->save();                

        session()->flash('success', 'Foto profil berhasil diperbarui.');

        return redirect()->route('manager.edit-profile', ['id' => $request['user_id']]);
    }
    public function recruiterDetail($recruiterId){
        \Carbon\Carbon::setLocale('id');
        if(auth()->check()){
            if (auth()->user()->role == 'manager') {         
                $recruiterData = Recruiter::where('user_id', Auth::id())->first();                          
                $job = Job::where('recruiter_id', $recruiterId)->paginate(3);                                                            
                $recruiter = Recruiter::where('id', $recruiterId)->first();                
                
                return view("applier/recruiterDetail", compact('recruiterData', 'job','recruiter'));
            } else {
                $applier = Applier::where("user_id",Auth::id())->first();                            
                $recruiter = Recruiter::where('id', $recruiterId)->first();
                $job = Job::where('recruiter_id', $recruiterId)->paginate(3);                                                            
                
                return view("applier/recruiterDetail", compact('job', 'applier','recruiter'));
            }                                  
        }  
        $job = Job::where('recruiter_id', $recruiterId)->paginate(3);                                                            
        $recruiter = Recruiter::where('id', $recruiterId)->first();        
                
        return view("applier/recruiterDetail", compact('job','recruiter'));
    }

    public function recruiterList(){
        if(auth()->check()){
            if (auth()->user()->role == 'manager') {         
                $recruiterData = Recruiter::where('user_id', Auth::id())->first();                          
                $recruiter = Recruiter::paginate(9);                                                            
                // $recruiter = Recruiter::where('id', $recruiterId)->first();                
                foreach ($recruiter as $recruiters) {
                    $recruiters->jobs_count = Job::where("recruiter_id", $recruiters->id)->count();
                }

                return view("applier/recruiterList", compact('recruiterData', 'recruiter'));
            } else {
                $applier = Applier::where("user_id",Auth::id())->first();                                            
                $recruiter = Recruiter::paginate(9);      

                foreach ($recruiter as $recruiters) {
                    $recruiters->jobs_count = Job::where("recruiter_id", $recruiters->id)->count();
                }

                return view("applier/recruiterList", compact('recruiter', 'applier'));
            }                                  
        }                  

        // recruiter = Job::where('recruiter_id', $recruiterId)->paginate(3);                                                            
        // $recruiter = Recruiter::where('id', $recruiterId)->first();        
        $recruiter = Recruiter::paginate(9);     
        foreach ($recruiter as $recruiters) {
            $recruiters->jobs_count = Job::where("recruiter_id", $recruiters->id)->count();
        }
                
        return view("applier/recruiterList", compact('recruiter'));
    }
}
