<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['id','name','description','path', 'created_at', 'updated_at'];

	public function categories()
	{
		return $this->belongsToMany('App\Category', 'categories_products');
	}
}
