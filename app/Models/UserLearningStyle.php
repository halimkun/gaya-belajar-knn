<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserLearningStyle
 *
 * @property $id
 * @property $user_id
 * @property $learning_style_id
 * @property $assessment_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Assessment $assessment
 * @property LearningStyle $learningStyle
 * @property User $user
 * @package App
 * 
 */
class UserLearningStyle extends Model
{
    use SoftDeletes;

    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'learning_style_id', 'assessment_id'];


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
    public function learningStyle()
    {
        return $this->belongsTo(\App\Models\LearningStyle::class, 'learning_style_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
}
