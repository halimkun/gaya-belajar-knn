<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserLearningStyles extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_learning_styles';

    protected $fillable = [
        'user_id',
        'learning_style_id',
        'assessment_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function learningStyle()
    {
        return $this->belongsTo(LearningStyles::class);
    }

    public function assessment()
    {
        return $this->belongsTo(Assessments::class);
    }
}
