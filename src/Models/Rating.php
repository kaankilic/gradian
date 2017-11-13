<?php

namespace Kaankilic\Gradian\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'ratings';

	/**
	 * @var array
	 */
	protected $fillable = ['rating', 'ratingable_id' , 'ratingable_type','average_rating' , 'user_id'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function rateable()
	{
		return $this->morphTo('');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function author()
	{
		return $this->morphTo('user');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function labels(){
		return $this->hasMany(RatingLabels::class);
	}

	/**
	 * @param Model $ratingable
	 * @param $data
	 * @param Model $author
	 *
	 * @return static
	 */
	public function createUniqueRating(Model $ratingable, $data, Model $author)
	{
		$rating = [
			'author_id' => $author->id,
			"ratingable_id" => $ratingable->id,
			"ratingable_type" => get_class($ratingable),
		];
		Rating::updateOrCreate($rating, $data);
		return $rating;
	}

	/**
	 * @param $id
	 * @param $data
	 *
	 * @return mixed
	 */
	public function updateRating($id, $data)
	{
		$rating = static::find($id);
		$rating->update($data);

		return $rating;
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function deleteRating($id)
	{
		return static::find($id)->delete();
	}
}