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
 * @property Answer[] $answers
 * @property EducationalContent[] $educationalContents
 * @property UserLearningStyle[] $userLearningStyles
 * @package App
 * @property-read int|null $answers_count
 * @property-read int|null $educational_contents_count
 * @property-read int|null $user_learning_styles_count
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle query()
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LearningStyle withoutTrashed()
 * @mixin \Eloquent
 * @mixin IdeHelperLearningStyle
 */
class LearningStyle extends Model
{
    use SoftDeletes;

    protected $perPage = 10;

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
