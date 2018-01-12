<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersEditRequest;

class adminUsersController extends Controller
{


    public function index()
    {
        $users=User::all();
        return view("admin.users.index",compact('users'));
    }


    public function create()
    {
        $roles = Role::pluck("name","id");
        //return $roles;
       return view("admin.users.create",compact('roles'));
    }


    public function store(UsersCreateRequest $request)
    {
        $input  = $request->all();

        if($file = $request->file('file')){
            $fileName = time().$file->getClientOriginalName();
            if($file->move('img',$fileName)){
                $photo   = Photo::create(['file' => $fileName]);
                $input['photo_id'] = $photo->id;
            }
        }

        $input['password'] = bcrypt($request->password);
        User::create($input);
        $request->session()->flash('UpdateInsertStatus', 'Insert was successful!');
        return redirect('/admin/users');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $roles = Role::pluck("name","id");
        $user = User::findOrFail($id);
        return view("admin.users.edit",compact('user','roles'));
    }


    public function update(UsersEditRequest $request, $id)
    {

        $input  = $request->all();
        $user   = User::findOrFail($id);

        if($file = $request->file('file')){
            $fileName = time().$file->getClientOriginalName();
            if($file->move('img',$fileName)){
                $photo   = Photo::create(['file' => $fileName]);
                $input['photo_id'] = $photo->id;
            }
        }



        //$input['password'] = bcrypt($request->password);
        unset($input['password']);
        $user->update($input);

        $request->session()->flash('UpdateInsertStatus', 'Update was successful!');
        return redirect('/admin/users');

    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/users');
    }
}
