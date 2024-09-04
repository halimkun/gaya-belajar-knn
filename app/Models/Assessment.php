<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Assessment
 *
 * @property $id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property User $user
 * @property AssessmentAnswer[] $assessmentAnswers
 * @property UserLearningStyle[] $userLearningStyles
 * @package App
 * 
 */
class Assessment extends Model
{
    use SoftDeletes;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assessmentAnswers()
    {
        return $this->hasMany(\App\Models\AssessmentAnswer::class, 'id', 'assessment_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userLearningStyles()
    {
        return $this->hasMany(\App\Models\UserLearningStyle::class, 'id', 'assessment_id');
    }
    
}
