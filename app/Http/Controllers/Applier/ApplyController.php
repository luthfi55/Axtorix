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
        ]);
        
        return redirect()->route('jobList');
    }
}
