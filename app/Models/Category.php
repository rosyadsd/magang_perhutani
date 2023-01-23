<?php

namespace App\Models;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function laporans() 
    {
        return $this->hasMany(Laporan::class);
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
