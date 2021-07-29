<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'name' =>'required|max:100' ,
           'password' =>'required|email|min:8|max:100' ,
           'email' =>'required |email|unique:users,email' ,
        //    unique : check trùng.
          'address'=>'required',
          'role'=>'required|in : ' . implode(',',config('common.user.role')),
          'gender'=>'required|in : ' . implode(',',config('common.user.gender')),
        ];
    }
    public function messages(){
        return[
        //    'name.required'=>'tên k dc để trống',
        //    'email.required'=>'email k dc để trống',
           'required' =>':attribute Không được để trống',
           'name.max'=>'tên không quá 100 ký tự',
           'email.email'=>'Sai định dạng',
           'name.unique'=>'Email đã tồn tại',
            
        ];
    }
    public function attribute(){
        return[
          'name'=>'Họ Tên',
          'email'=>'Email',
          'password'=>'Mật Khẩu',
          'address'=>'Địa Chỉ',
          'role'=>'tài Khoản',
          'gender'=>'Giới Tính',

        ];
    }
}
