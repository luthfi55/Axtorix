<?php

namespace App\Http\Controllers\Applier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applier;

class ProfileController extends Controller
{
    public function index(Request $request){
        if ( $request->id != Auth::user()->id ){
            return redirect("home");
        } else {
            $applier = Applier::where('user_id', $request->id)->first();
            return view("applier/profile", compact('applier'));
        }    
    }

    public function update(Request $request){
        $request->validate([
            'id' => 'required',
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'birth_date' => 'required',    
            'bio' => 'required',
            'experience' => 'required', 
            'categories' => 'required',
            'languages' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',            
        ]);            

        $applier = Applier::findOrFail($request['id']);        
        $applier->name = $request['name'];
        $applier->email = $request['email'];
        $applier->phone_number = $request['phone_number'];
        $applier->birth_date = $request['birth_date'];
        $applier->bio = $request['bio'];
        $applier->experience = $request['experience'];
        $applier->categories = $request['categories'];
        $applier->languages = $request['languages'];
        $applier->country = $request['country'];
        $applier->city = $request['city'];
        $applier->address = $request['address'];
        $applier->facebook = $request['facebook'];
        $applier->twitter = $request['twitter'];
        $applier->instagram = $request['instagram'];
        $applier->save();     
        
        session()->flash('success', 'Profil berhasil diperbarui.');

        return redirect()->route('profile', ['id' => $request['user_id']]);
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
            $path = $file->storeAs('picture', $filename, 'public');
        }        

        $applier = Applier::findOrFail($request['id']);
        $applier->picture = $path;        
        $applier->save();        

        session()->flash('success', 'Foto profil berhasil diperbarui.');

        return redirect()->route('profile', ['id' => $request['user_id']]);
    }

}
