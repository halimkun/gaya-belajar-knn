<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LearningStyles extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'learning_styles';

    protected $fillable = [
        'type',
        'description',
    ];
}
