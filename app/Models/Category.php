<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
