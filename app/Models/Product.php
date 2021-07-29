<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // chỉ định tên table nếu k đặt theo quy tắc.
    protected $table = 'products';
    //     mặc định Eloquent cơi primakey là cột id . nếu khác phải chỉ định.
    protected $primakey = 'id';
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category_id',
        'image',
       
    ];
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id' , 'id');
    }
}

