<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategories extends FormRequest
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
            'name' =>'required|max:5' ,
        ];
    }
    public function messages(){
        return[
           'name.required'=>'Tên không dc để trống',
           'name.max'=>'tên không quá 30 ký tự',
                    
        ];
    }
}
