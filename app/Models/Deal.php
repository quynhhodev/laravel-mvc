<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deal extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'hongocquynhdeals';
    public $fillable = [
        'title','slug', 'image', 'detail', 'price', 'salePrice', 'countDown'
    ];
    public $timestamp = 'true';
}
