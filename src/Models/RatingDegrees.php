<?php

namespace Kaankilic\Gradian\Models;

use Illuminate\Database\Eloquent\Model;

class RatingDegrees extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'rating_degrees';

	/**
	 * @var array
	 */
	protected $fillable = ['rating', 'label_id' , 'rating_id', 'user_id','ratingable_id','ratingable_type'];

	/**
	 * @var array
	 */
	public function label(){
		return $this->belongsTo(RatingLabel::class);
	}
	
	/**
	 * @var array
	 */
	public function user(){
		return $this->belongsTo(config()->get('auth.model'));
	}
}