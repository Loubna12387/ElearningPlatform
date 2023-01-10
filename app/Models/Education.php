<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable=['title','slug','description','image','prix','type_education_id'];

    public function typeeducation()
    {
        return $this->belongsTo(TypeEducation::class,'type_education_id');
    }

    public function paragraph()
    {
        return $this->hasMany(Paragraphe::class,'paragraphes_id');
    }
}
