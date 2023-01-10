<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraphe extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','education_id'];


    public function education()
    {
        return $this->belongsTo(Education::class,'education_id');
    }
    public function quizes()
    {
        return $this->hasMany(Quize::class,'quizes_id');
    }
    public function contents()
    {
        return $this->hasMany(Content::class,'contentes_id');
    }
}
