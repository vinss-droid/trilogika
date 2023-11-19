<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schema extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'nomor', 'content', 'jp'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
