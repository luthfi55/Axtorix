<?php

namespace App\Http\Controllers\Applier;

use App\Http\Controllers\Controller;
use App\Models\Applier;
use App\Models\Apply;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function create(Request $request){                
        $request->validate([
            'applier_id' => 'required',
            'job_id' => 'required',            
            'email' => 'required',            
            'phone_number' => 'required',            
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048' 
        ]);         

        $applier = Applier::where('user_id', $request['applier_id'])->first();                                     

        if (!$applier) {
            return response()->json(['error' => 'User not found'], 404);
        } else {
            $applierID = $applier->id;            
        }

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('resume', $filename, 'public');
        }

        Apply::create([
            'applier_id'=> $applierID,
            'job_id'=> $request['job_id'],
            'email'=> $request['email'],
            'phone_number'=> $request['phone_number'],
            'resume' => $path,
            'link_vidio'=> $request['link_vidio'],
            'status' => "pending",
        ]);
        
        session()->flash('success', 'Lamar pekerjaan berhasil.');

        return redirect()->route('jobList');
    }

    public function applyApplier(Request $request){                
        $request->validate([
            'apply_id' => 'required',     
            'apply_status' => 'required',
            'job_id' => 'required'
        ]);          

        $apply = Apply::findOrFail($request['apply_id']);        
        if (!$apply) {            
            return response()->json(['error' => 'Apply job not found'], 404);
        } else {            
            if ($request->apply_status == 'accept'){
                $apply->status = 'accept';
                $apply->save();
                session()->flash('success', 'Pelamar diterima.');
            } else {
                $apply->status = 'reject';
                $apply->save();
                session()->flash('success', 'Pelamar ditolak.');
            }            
            // $applyID = $apply->id;       
            return redirect()->route('job.detail', $request->job_id);               
        }
    }
}
