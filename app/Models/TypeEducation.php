<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEducation extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug', 'modules_id'];


    public function module()
    {
        return $this->belongsTo(Module::class,'modules_id');
    }
    public function Education()
    {
        return $this->hasMany(Education::class,'education_id');
    }
}
