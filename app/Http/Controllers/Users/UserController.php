<?php

namespace App\Http\Controllers\Users;

use Exception;
use App\Models\User;
use App\Models\Images;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\Connectors\RedisConnector;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role('staff')->paginate(10);
        return view('users.all_users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.staff_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->except('_token', 'images'))->assignRole('staff');
        if ($request->file('images') != '') {
            foreach ($request->file('images') as $index => $image) {
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'images/profile',
                    $fileName,
                    'public'
                );
                $imageSave->images = $path;
                $imageSave->users_id = $user->id;
                $imageSave->save();
            }
        } else {
            $imageSave = new Images;
            $imageSave->users_id = $user->id;
            $imageSave->save();
        }
        return redirect()->route('staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }
    public function profile()
    {
        return view('users.profile');
    }
    public function profile_update()
    {
        return view('users.alter_profile');
    }
    public function profile_update_me(Request $request)
    {

        $user = User::find(Auth::user()->id);
        $user->update($request->except('_token', 'images', 'password'));
        if ($request->password == "") $password = Auth::user()->password;
        else $password = $request->password;
        if ($request->file('images') != '') {
            try {
                $id = Auth::user()->id;
                $image = Images::where('users_id', $id)->first();
                Storage::disk('public')->delete($image->images);
                $image->delete();
            } catch (Exception $exc) {
            }
            $image = $request->file('images');
            $imageSave = new Images;
            $file = Str::random(5);
            $ext = $image->getClientOriginalExtension();
            $fileName = $file . '.' . $ext;
            $path = $image->storeAs(
                'images/profile',
                $fileName,
                'public'
            );
            $imageSave->images = $path;
            $imageSave->users_id = $user->id;
            $imageSave->save();
            Session::put('picprofile', 'storage/' . $path);
        }
        return redirect()->route('profile');
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
        //
    }
    public function delete($id)
    {
        $images = Images::where('users_id', $id)->get();
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->images);
        }
        Images::where('users_id', $id)->delete();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserController::delete($id);
        User::find($id)->delete();
        return \redirect()->route('staff');
    }
}
