<?php

namespace Beestreams\LaravelRatable\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'rating'
    ];

    /**
     * Example model relation
     */
    // public function model()
    // {
    // 	return $this->morphedByMany(Model::class, 'Ratable');
    // }
}
