<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hongocquynhpages';
    public $timestamp = 'true';
    protected $fillable = [
    'title',
    'slug',
    'image',
    'content',
    'sumary',
    'status',
    ];
}
