<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
	use NodeTrait;

	protected $fillable = ['id','name','paretn_id','_lft', '_rgt', 'created_at', 'updated_at'];

	public function products()
	{
		return $this->belongsToMany('App\Product', 'categories_products');
	}
}
