<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{

    public function index()
    {
        $data = User::all();

        return view('userIndex',compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:25',
            'middle_name' => 'max:25',
            'last_name' => 'required|max:25',
            'gender' => 'required',
            'role_name' => 'required',
            'email' => 'email|required|min:4|max:50|unique:users',
            'password' => 'required|confirmed',
        ]);

        $data = new User();
        $data->first_name = $request->first_name;
        $data->middle_name = $request->middle_name;
        $data->last_name = $request->last_name;
        $data->gender = $request->gender;
        $data->role_name = $request->role_name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        
        if ($request->photo) {
            $this->validate($request, [
                'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $file = $request->file('photo');
            $image_name = time() . '_' . $file->getClientOriginalName();
            
            $img = Image::make($file->getRealPath());
            $img->resize(550, 550, function ($constraint) {
                $constraint->aspectRatio();
            })->save('img/thumbnail/' . $image_name);

            $file->move('users', $image_name);
            
            $data->photo = $image_name;
        }
        $data->save();
        $data->roles()->attach(Role::where('name', $request->role_name)->first());
        return view('auth\login');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('userEdit',compact('data'));
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
        $data = User::find($id);
        $data->role_name = $request->role_name;
        $data->save();
        $data->roles()->sync(Role::where('name',$data->role_name)->first());
        return redirect(route('index.user'));
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect(route('index.user'));
    }

    public function updateprofil(Request $request, $id){
        $data = User::find($id);
        $data->first_name = $request->first_name;
        $data->middle_name = $request->middle_name;
        $data->last_name = $request->last_name;
        $data->gender = $request->gender;
        $data->role_name = $request->role_name;
        $data->email = $request->email;
        if ($request->password) {
            $this->validate($request, [
                'password' => 'required',
            ]);
            $data->password = bcrypt($request->password);
        }

        if ($request->photo) {
            $this->validate($request, [
                'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $file = $request->file('photo');
            $image_name = time() . '_' . $file->getClientOriginalName();

            if ($data->photo) {
                if (File::exists(public_path() .'/users/' . $data->photo)) {
                    unlink(public_path() . '/users/' . $data->photo);
                }

                if (File::exists('/users/thumbnail/' . $data->photo)) {
                    unlink(public_path() . '/users/thumbnail/' . $data->photo);
                }
            }
            $img = Image::make($file->getRealPath());
            $img->resize(550, 550, function ($constraint) {
                $constraint->aspectRatio();
            })->save('img/thumbnail/' . $image_name);
            $file->move('users', $image_name);
            $data->photo = $image_name;
        }

        $data->save();
        return redirect(route('index.profile'));
    }
}
