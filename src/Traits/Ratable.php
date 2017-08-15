<?php

namespace Beestreams\LaravelRatable\Traits;

use Beestreams\LaravelRatable\Models\Category;

trait Ratable 
{
    /**
     * Add or create single category
     * @param String $name The Category name to be added
     */
    public function rate($rating, $rater = null)
    {
        if ($rater == null) {
            $rater = Auth::user();
        }
        $rating = [
            'author_id' => $rater->id,
            'author_type' => User::class,
            "ratingable_id" => $ratingable->id,
            "ratingable_type" => get_class($this),
        ];
        Rating::updateOrCreate($rating, $data);
        $this->ratings()->save($rating);
    }

    /**
    * Get all of the categories for the categorable model.
    */
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratable');
    }

    /**
     * Remove category by ID or Name
     * @param  Int or String $category will be checked and handled
     */
    public function removeRating($category)
    {
        if (is_int($category)) {
            $this->removeCategoryById($category);
        }
        if (is_string($category)) {
            $category = Category::where('name', $category)->firstOrFail();
        }

        $this->removeCategories([$category->id]);
        
        return $this;
    }
}