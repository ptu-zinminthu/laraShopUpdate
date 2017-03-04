<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SoftDeletes;
use Nestable\NestableTrait;

class Category extends Model
{

    use NestableTrait;
	//use SoftDeletes; //SoftDeletes is trait (trait  is some part of class) .

   

    protected $parent = 'parent_id';



	public $table = 'categories';

	//use SoftDeletes;
    protected $fillable = [
    'title', 'icon_image', 'parent_id'
    ];

    protected $hidden = [
   //
    ];
}
