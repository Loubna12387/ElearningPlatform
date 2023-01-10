<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quize extends Model
{
    use HasFactory;
    protected $fillable=['description','totalmarks','paragraphes_id'];

    public function paragraphe()
    {
        return $this->belongsTo(Paragraphe::class,'paragraphes_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class,'questions_id');
    }
}
