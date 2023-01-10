<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug', 'user_id'];


    public function TypesEducation()
    {
        return $this->hasMany(TypeEducation::class,'type_education_id');
    }
}
