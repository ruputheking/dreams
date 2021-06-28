<?php

namespace App\Http\Controllers\Backend\User;

use DB;
use Hash;
use Validator;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('*', 'users.id as id')
                    ->join('role_user', 'role_user.user_id', '=', 'users.id')
                    ->where('role_user.role_id', 1)
                    ->OrWhere('role_user.role_id', 5)
                    ->OrWhere('role_user.role_id', 6)
                    ->OrWhere('role_user.role_id', 7)
                    ->orderBy('users.id', 'desc')
                    ->get();
        return view('backend.users.user-list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.user-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')){
           $image = $request->file('image');
           $ImageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
           $image->move(base_path('public/frontend/images/users/'), $ImageName);
        }

        $user = new User;
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($request->hasFile('image')) {
            $user->photo = 'users/'.$ImageName;
        }else {
            $user->photo = 'profile.png';
        }
        $user->save();
        $user->attachRole($request->user_type);

       return redirect()->route('users.index')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.user-view',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.user-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'password' => 'nullable|min:6|confirmed',
            'email' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
  			'user_type' => 'required',
            'image' => 'nullable|image|max:5120',
        ]);

        $user = User::findOrFail($id);
        $role = DB::table('role_user')->where('user_id', $user->id)->first();

        if ($request->hasFile('image')){
           $image = $request->file('image');
           $ImageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
           $image->move(base_path('public/frontend/images/users/'), $ImageName);
           $user->photo = 'users/'. $ImageName;
       }
        $user->update([
            'user_name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->detachRole($role->role_id);
        $user->attachRole($request->user_type);

       return redirect()->route('users.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Information has been deleted');
    }
}
