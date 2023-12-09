<?php

namespace App\Http\Controllers\Applier;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applier;

class CvController extends Controller
{
    public function index(Request $request){
        if ( $request->id != Auth::user()->id ){
            return redirect("home");
        } else {
            $applier = Applier::where('user_id', $request->id)->first();
            $education = Education::where('user_id', $request->id)->orderBy('start_date', 'asc')->get();
            $experience = Experience::where('user_id', $request->id)->orderBy('start_date', 'asc')->get();
            return view("applier/profile-cv", compact('applier','education', 'experience'));
        }    
    }

    public function updateResume(Request $request){        
            $request->validate([
                'id' => 'required',
                'user_id' => 'required',                
                'resume' => 'required|file|mimes:pdf,doc,docx' 
            ]);      
            
        
            
            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('resume', $filename, 'public');
            }

            $applier = Applier::findOrFail($request['id']);
            $applier->resume = $path;
            $applier->save();                        
            
            session()->flash('success', 'CV berhasil diperbarui.');

            return redirect()->route('profile-cv', ['id' => $request['user_id']]);
    }

    public function createEducation(Request $request){
        $request->validate([            
            'user_id' => 'required',                
            'start_date' => 'required',
            'end_date' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);      
                

        Education::create([
            'user_id'=> $request['user_id'],
            'start_date'=> $request['start_date'],
            'end_date'=> $request['end_date'],
            'name'=> $request['name'],
            'description' => $request['description'],            
        ]);                   
        
        session()->flash('success-education', 'Data edukasi berhasil ditambahkan.');

        return redirect()->route('profile-cv', ['id' => $request['user_id']]);
    }

    public function createExperience(Request $request){
        $request->validate([            
            'user_id' => 'required',                
            'start_date' => 'required',
            'end_date' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);      
                

        Experience::create([
            'user_id'=> $request['user_id'],
            'start_date'=> $request['start_date'],
            'end_date'=> $request['end_date'],
            'name'=> $request['name'],
            'description' => $request['description'],            
        ]);                   
        
        return redirect()->route('profile-cv', ['id' => $request['user_id']]);
    }

    public function deleteEducation($id) {
        // Mencari data pendidikan berdasarkan ID
        $education = Education::find($id);
    
        // Cek apakah data pendidikan ditemukan
        if (!$education) {
            return redirect()->back()->with('error', 'Data pendidikan tidak ditemukan.');
        }
    
        // Hanya mengizinkan penghapusan jika user yang terautentikasi memiliki data pendidikan tersebut
        if (Auth::user()->id != $education->user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus data ini.');
        }
    
        // Melakukan penghapusan
        $education->delete();
    
        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data pendidikan berhasil dihapus.');
    }
    
    public function deleteExperience($id) {
        // Mencari data pengalaman berdasarkan ID
        $experience = Experience::find($id);
    
        // Cek apakah data pengalaman ditemukan
        if (!$experience) {
            return redirect()->back()->with('error', 'Data pengalaman tidak ditemukan.');
        }
    
        // Hanya mengizinkan penghapusan jika user yang terautentikasi memiliki data pengalaman tersebut
        if (Auth::user()->id != $experience->user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus data ini.');
        }
    
        // Melakukan penghapusan
        $experience->delete();
    
        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data pengalaman berhasil dihapus.');
    }
    
}
