<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'categories';
    public $timestamp = 'true';
    protected $fillable = [
    'customerId',
    'total',
    'note',
    'status',
    ];
}
