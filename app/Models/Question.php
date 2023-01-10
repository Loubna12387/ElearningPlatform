<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=['content','answer','marke','quizes_id'];

    public function quize()
    {
        return $this->belongsTo(Quize::class,'quizes_id');
    }

    public function chois()
    {
        return $this->hasMany(Choi::class,'chois_id');
    }
}
