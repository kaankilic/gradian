<?php

namespace Kaankilic\Gradian\Traits;

use Kaankilic\Gradian\Models\Rating;
use Illuminate\Database\Eloquent\Model;

trait Gradable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }
    public function rating($ratingable_id){
        return $this->ratings()->where("ratingable_id",$ratingable_id)->firstOrFail();
    }
    public function categoryAverages($ratingable_id){
        $collection = [];
        foreach ($this->rating($ratingable) as $rating) {
        }
    }
    /**
     *
     * @return mix
     */
    public function avgRating()
    {
        return $this->ratings()->avg("average_rating");

    }

    /**
     *
     * @param column
     * @param filter
     * @return mix
     */
    public function avgRatingByFilter($column, $filter)
    {
        return $this->ratings()->where($column, $filter)->avg('average_rating');

    }

    /**
     *
     * @return mix
     */
    public function sumRating()
    {
        return $this->ratings()->sum('average_rating');
    }

    /**
     * @param $max
     *
     * @return mix
     */ 
    public function ratingPercent($max = 5)
    {
        $quantity = $this->ratings()->count();
        $total = $this->sumRating();
        return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 100) : 0;
    }
    
    /**
     * @param $data
     * @param Model      $author
     * @param Model|null $parent
     *
     * @return static
     */
    public function rating($data, Model $author, Model $parent = null)
    {
        return (new Rating())->createRating($this, $data, $author);
    }

    /**
     * @param $data
     * @param Model      $author
     * @param Model|null $parent
     *
     * @return static
     */
    public function ratingUnique($data, Model $author, Model $parent = null)
    {
        return (new Rating())->createUniqueRating($this, $data, $author);
    }

    /**
     * @param $data
     * @param Model      $author
     * @param Model|null $parent
     *
     * @return static
     */
    public function ratingQuestionUnique($data, Model $author, Model $parent = null)
    {
        return (new Rating())->createUniqueQuestionRating($this, $data, $author);
    }
    
    /**
     * @param $id
     * @param $data
     * @param Model|null $parent
     *
     * @return mixed
     */
    public function updateRating($id, $data, Model $parent = null)
    {
        return (new Rating())->updateRating($id, $data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteRating($id)
    {
        return (new Rating())->deleteRating($id);
    }

    public function getAvgRatingAttribute()
    {
        return $this->avgRating();
    }

    public function getratingPercentAttribute()
    {
        return $this->ratingPercent();
    }

    public function getSumRatingAttribute()
    {
        return $this->sumRating();
    }

    public function getCountPositiveAttribute()
    {
        return $this->countPositive();
    }

    public function getCountNegativeAttribute()
    {
        return $this->countNegative();
    }
}