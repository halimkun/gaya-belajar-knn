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
 * @property Answer $answer
 * @property Assessment $assessment
 * @property Question $question
 * @package App
 * @property-read \App\Models\Answer|null $userAnswer
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer whereAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer whereAssessmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentAnswer withoutTrashed()
 * @mixin \Eloquent
 * @mixin IdeHelperAssessmentAnswer
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
     * Alias for `answer`
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userAnswer()
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
