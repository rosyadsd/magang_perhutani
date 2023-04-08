<?php

namespace App\Models;

use App\Models\Laporan;
use App\Models\Bkph;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bkph extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
        
    public function laporans() 
    {
        return $this->hasMany(Laporan::class);
    }
        

}
