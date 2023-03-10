<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment'];

    public function film()
    {
        return $this->belongsTo(Film::class)->orderBy('id', 'DESC');
    }
}
