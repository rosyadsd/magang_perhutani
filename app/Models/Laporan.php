<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function bkph(){
        return $this->belongsTo(Bkph::class, 'bkph_id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
