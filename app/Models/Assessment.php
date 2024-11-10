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
 * @property User $user
 * @property AssessmentAnswer[] $assessmentAnswers
 * @property UserLearningStyle[] $userLearningStyles
 * @package App
 * @property-read int|null $assessment_answers_count
 * @property-read int|null $user_learning_styles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Assessment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assessment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assessment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Assessment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Assessment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assessment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assessment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assessment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assessment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assessment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Assessment withoutTrashed()
 * @mixin \Eloquent
 * @mixin IdeHelperAssessment
 */
class Assessment extends Model
{
    use SoftDeletes;

    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'dataset_id', 'raw_percentage', 'raw_neighbors', 'ai_recomendation'];


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
        return $this->hasMany(\App\Models\AssessmentAnswer::class, 'assessment_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userLearningStyles()
    {
        return $this->hasMany(\App\Models\UserLearningStyle::class, 'id', 'assessment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dataset()
    {
        return $this->belongsTo(\App\Models\Dataset::class, 'dataset_id', 'id');
    }
}
