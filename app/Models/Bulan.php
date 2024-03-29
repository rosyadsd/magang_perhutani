<?php

namespace App\Models;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function laporans() 
    {
        return $this->hasMany(Laporan::class);
    }
}
