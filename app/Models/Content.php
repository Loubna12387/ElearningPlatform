<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Node\Block\Paragraph;

class Content extends Model
{
    use HasFactory;
    protected $fillable=['image','video','texte','paragraphes_id'];
    public function paragraphe()
    {
        return $this->belongsTo(Paragraph::class,'paragraphes_id');
    }
}
