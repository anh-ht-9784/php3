<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateUpdateRequest;

class UserController extends Controller 
{
    public function index()
    {
        $list = User::all();
        $list->load('invoices');
        // $user = $list->first();
        // dd($list);
        // $user = $list->find('10'); 
        // dd($user->invoices());
  
        return view('admin/users/index', ['data' => $list]);
    }
    public function show(User $user)
    {
    //   $user = User::find($id);
      return view('admin/users/show', ['user' => $user]);
    }
    public function create()
    {
        return view('admin/users/create');
    }
    public function store(StoreRequest $request )
    {
         // dd($_REQUEST);
    //  Hàm laravel quy định sẵn  $_REQUEST = request()->all() 
    // Lấy toàn bộ sữ liệu gửi lên trừ _token dùng : request()->except("_token)
        $data = request()->except("_token");
        //  dd($data);
        // $data['password'] = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        User::Create($data);

        return redirect()->route('admin.users.index');
    }
    public function edit($id)

    {
        $data = User::find($id);
        return view('admin/users/edit', ['data' => $data]);
    }
    public function update(UpdateUpdateRequest $request, User $user)
    {
        $user = User::find($user);
        $data = $request->except("_token");
      
        $user->update($data);
        return redirect()->route('admin.users.index');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete($id);
        return redirect()->route('admin.users.index');
    }
}
