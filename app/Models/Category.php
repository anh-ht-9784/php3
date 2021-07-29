<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    // chỉ định tên table nếu k đặt theo quy tắc.
    protected $table = 'categories';
    //     mặc định Eloquent cơi primakey là cột id . nếu khác phải chỉ định.
    protected $primakey = 'id';
    protected $fillable = [
        'name',
       
    ];
    public function products(){
        return $this->hasMany(Product::class, 'category_id' , 'id');
    }
}
 