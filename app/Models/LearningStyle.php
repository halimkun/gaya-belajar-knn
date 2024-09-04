<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LearningStyle
 *
 * @property $id
 * @property $type
 * @property $description
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Answer[] $answers
 * @property EducationalContent[] $educationalContents
 * @property UserLearningStyle[] $userLearningStyles
 * @package App
 * 
 */
class LearningStyle extends Model
{
    use SoftDeletes;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['type', 'description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(\App\Models\Answer::class, 'id', 'learning_style_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function educationalContents()
    {
        return $this->hasMany(\App\Models\EducationalContent::class, 'id', 'learning_style_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userLearningStyles()
    {
        return $this->hasMany(\App\Models\UserLearningStyle::class, 'id', 'learning_style_id');
    }
    
}
