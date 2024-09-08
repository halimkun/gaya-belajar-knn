<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AssessmentAnswer
 *
 * @property $id
 * @property $assessment_id
 * @property $question_id
 * @property $answer_id
 * @property $answer
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Answer $answer
 * @property Assessment $assessment
 * @property Question $question
 * @package App
 * 
 */
class AssessmentAnswer extends Model
{
    use SoftDeletes;

    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['assessment_id', 'question_id', 'answer_id', 'answer'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo(\App\Models\Answer::class, 'answer_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assessment()
    {
        return $this->belongsTo(\App\Models\Assessment::class, 'assessment_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(\App\Models\Question::class, 'question_id', 'id');
    }
    
}
