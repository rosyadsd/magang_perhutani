<?php

namespace App\Models;

use App\Models\Laporan;
use App\Models\Bkph;
use App\Models\Bulan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;
    
    // protected $fillable = [
    //     'name',
    //     'keterangan',
    //     'image',
    //     'excerpt',
    // ];

    protected $guarded = ['id'];

    public function laporans() 
    {
        return $this->hasMany(Laporan::class);
    }

    
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset('storage/images/' . $this->image);
    }


}
