<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hongocquynhcontacts';
    public $timestamp = 'true';
    protected $fillable = [
    'email',
    'title',
    'content',
    'status',
    ];
}
