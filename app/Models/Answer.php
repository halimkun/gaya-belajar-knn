<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Answer
 *
 * @property $id
 * @property $question_id
 * @property $learning_style_id
 * @property $answer
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property LearningStyle $learningStyle
 * @property Question $question
 * @property AssessmentAnswer[] $assessmentAnswers
 * @package App
 * 
 */
class Answer extends Model
{
    use SoftDeletes;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['question_id', 'learning_style_id', 'answer'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learningStyle()
    {
        return $this->belongsTo(\App\Models\LearningStyle::class, 'learning_style_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(\App\Models\Question::class, 'question_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assessmentAnswers()
    {
        return $this->hasMany(\App\Models\AssessmentAnswer::class, 'id', 'answer_id');
    }
    
}
