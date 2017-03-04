<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
	public $table = 'pages';

    protected $fillable = [
    'title','slug', 'description'
    ];
}
