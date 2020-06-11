<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

         return view('admin.users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDATE DATA
        $inputs = request()->validate([
            'name'=>'required|string|min:4|max:255',
            'email'=>'required|string|email',
            'password'=>'required|string|min:8',
        ]);

        $inputs['role'] = $request->role;
        $inputs['university'] = $request->university;
        $inputs['program'] = $request->program;
        $inputs['birthday'] = $request->birthday;

        $user = new User($inputs);

        //return $user;
        $user->save();

        session()->flash('user-created-message', $user->name.' was added');

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
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
        //VALIDATE DATA
        $inputs = request()->validate([
            'name'=>'required|string|min:4|max:255',
            'email'=>'required|string|email',
        ]);

        $inputs['role'] = $request->role;
        $inputs['university'] = $request->university;
        $inputs['program'] = $request->program;
        $inputs['birthday'] = $request->birthday;

        $user = User::findOrFail($id);

        $user->update($inputs);

        session()->flash('user-updated-message', $user->name.' was updated');

        return redirect('admin/users');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        //VALIDATE DATA
        $inputs = request()->validate([
            'name'=>'required|string|min:4|max:255',
            'email'=>'required|string|email',
        ]);

        $inputs['university'] = $request->university;
        $inputs['program'] = $request->program;
        $inputs['birthday'] = $request->birthday;

        $user = User::findOrFail($id);

        $user->update($inputs);

        session()->flash('profile-updated-message', 'Your profile info was updated successfully!');

        return back();
    }

    public function resetPassword()
    {
        return view('auth.passwords.reset');
    }


    public function updatePassword(Request $request)
    {
        $curr_password = $request->current_password;

        if (!Hash::check($curr_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Incorrect password']);
        }

        $input = request()->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string',
        ]);

        $user = auth()->user();
        $user->password = Hash::make($input['password']);
        $user->save();

        session()->flash('suceess_message', 'Your password was reset successfully!');

        return redirect('/profile/'.auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find user
        $user = User::findOrFail($id);

        $user->delete();

        session()->flash('message', $user->name.' was deleted');

        return redirect('admin/users');
    }


    //
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toAdmin($id)
    {
        // Find user
        $user = User::findOrFail($id);

        $user->role = 'admin';
        $user->save();

        session()->flash('user-role-admin-message', $user->name.' was turned into an Admin');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toSubscriber($id)
    {
        // Find user
        $user = User::findOrFail($id);

        $user->role = 'subscriber';

        $user->save();

        session()->flash('user-role-sub-message', $user->name.' was turned into a Subscriber');

        return back();

    }
}
