<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   public $table = 'settings';

    protected $fillable = [
    'name', 'value'
    ];

    protected $hidden = [
   //
    ];
}
