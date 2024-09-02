<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationalContents extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'educational_contents';

    protected $fillable = [
        'title',
        'content',
        'learning_style_id',
    ];

    public function learningStyle()
    {
        return $this->belongsTo(LearningStyles::class);
    }

    public function userLearningStyles()
    {
        return $this->hasMany(UserLearningStyles::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, UserLearningStyles::class);
    }
}
