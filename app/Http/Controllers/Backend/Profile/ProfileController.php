<?php

namespace App\Http\Controllers\Backend\Profile;

use DB;
use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = User::find(Auth::User()->id);
        return view('backend.profile.profile-view', compact('profile'));
    }

    public function edit()
    {
      $profile = User::find(Auth::User()->id);
      return view('backend.profile.profile-edit',compact('profile'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'image' => 'mimes:png,jpg,jpeg,PNG,JPG,JPEG',
            'email' => [
                'required',
                Rule::unique('users')->ignore(Auth::User()->id),
            ],
        ]);

        $profile = User::findOrFail(Auth::User()->id);
        $oldImage = $profile->image;

        if ($oldImage !== $profile->photo) {
          $this->removeImage($oldImage);
        }
        if ($request->hasFile('image'))
        {
              $image       = $request->file('image');
              $fileName    = Str::uuid() . '' . $image->getClientOriginalName();
              $destination = public_path('frontend/images');
              $successUploaded = $image->move($destination, $fileName);
              $profile->photo = $fileName;
        }
        $profile->user_name = $request->name;
        $profile->email = $request->email;
        $profile->update();

        return redirect()->route('profile.index')->with('success', 'Information has been updated.');
    }

    private function handleRequest($request)
    {
      $data = $request->all();

      if ($request->hasFile('image'))
      {
        $image       = $request->file('image');
        $fileName    = Str::uuid() . '' . $image->getClientOriginalName();
        $destination = public_path('backend/images/avatar');

        $successUploaded = $image->move($destination, $fileName);

        $data['image'] = $fileName;
      }

      return $data;
    }

    private function removeImage($image)
    {
        if ( ! empty($image))
        {
          $imagePath = 'backend/images/avatar' . '/' . $image;
          $ext = substr(strrchr($image, '.'), 1);

          if (file_exists($imagePath)) unlink($imagePath);
        }
    }

    public function password()
    {
        return view('backend.profile.change-password');
    }

    public function profile_update(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find(Auth::User()->id);
        if(Hash::check($request->oldpassword, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
        }else{
            return redirect()->route('profile.password')->with('success', 'Old Password not match.');
        }
        return redirect()->route('profile.password')->with('success', 'Password has been changed.');
    }
}
