<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 *
 * @property $id
 * @property $question
 * @property $type
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Answer[] $answers
 * @property AssessmentAnswer[] $assessmentAnswers
 * @package App
 * 
 */
class Question extends Model
{
    use SoftDeletes;

    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['question', 'type'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(\App\Models\Answer::class, 'question_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assessmentAnswers()
    {
        return $this->hasMany(\App\Models\AssessmentAnswer::class, 'question_id', 'id');
    }
    
}
