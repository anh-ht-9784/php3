<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProducts extends FormRequest
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
            'name' =>'required|max:30' ,
            'price' => 'required|',
            'quantity'=>'integer|',
            'image' => 'file|image'
        ];
    }
    public function messages(){
        return[
           'name.required'=>'Tên không dc để trống',
           'name.max'=>'tên không quá 30 ký tự',
           'price.required'=>'Không được để trống giá',   
         
           'quantity.integer'=>'Số Lượng phải là số nguyên',
           'image.image'=>'Định dạng phải là anh',

         
                    
        ];
    }
}
