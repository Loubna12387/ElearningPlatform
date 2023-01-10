<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;
    protected $fillable=['contentchoi','questions_id'];

    public function question()
    {
        return $this->belongsTo(Question::class,'questions_id');
    }
}
