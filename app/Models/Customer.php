<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hongocquynhcustomers';
    public $timestamp = 'true';
    protected $fillable = [
    'customerName',
    'address',
    'phone',
    'email',
    'passWord'
    ];
}
