<?php

namespace Kaankilic\Gradian\Models;

use Illuminate\Database\Eloquent\Model;

class RatingLabel extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'rating_labels';

	/**
	 * @var array
	 */
	protected $fillable = ['title','min','max','average_rate','rating_id'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function grades(){
		return $this->hasMany(RatingDegrees::class);
	}
}