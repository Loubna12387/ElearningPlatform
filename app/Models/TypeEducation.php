<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEducation extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug'];



    public function Education()
    {
        return $this->hasMany(Education::class,'education_id');
    }
}
