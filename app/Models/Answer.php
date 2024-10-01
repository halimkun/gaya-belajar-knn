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
 * @property LearningStyle $learningStyle
 * @property Question $question
 * @property AssessmentAnswer[] $assessmentAnswers
 * @package App
 * @property-read int|null $assessment_answers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereLearningStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer withoutTrashed()
 * @mixin \Eloquent
 * @mixin IdeHelperAnswer
 */
class Answer extends Model
{
    use SoftDeletes;

    protected $perPage = 10;

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
