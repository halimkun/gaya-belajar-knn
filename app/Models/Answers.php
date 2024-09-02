<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answers extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'answers';

    protected $fillable = [
        'question_id',
        'answer',
        'learning_style_id',
    ];

    public function question()
    {
        return $this->belongsTo(Questions::class);
    }

    public function learningStyle()
    {
        return $this->belongsTo(LearningStyles::class);
    }

    public function scopeByQuestion($query, $questionId)
    {
        return $query->where('question_id', $questionId);
    }

    public function scopeByLearningStyle($query, $learningStyleId)
    {
        return $query->where('learning_style_id', $learningStyleId);
    }

    public function scopeByQuestionAndLearningStyle($query, $questionId, $learningStyleId)
    {
        return $query->where('question_id', $questionId)
            ->where('learning_style_id', $learningStyleId);
    }
}
