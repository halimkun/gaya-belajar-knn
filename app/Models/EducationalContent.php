<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EducationalContent
 *
 * @property $id
 * @property $title
 * @property $content
 * @property $learning_style_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 * @property LearningStyle $learningStyle
 * @package App
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent whereLearningStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalContent withoutTrashed()
 * @mixin \Eloquent
 * @mixin IdeHelperEducationalContent
 */
class EducationalContent extends Model
{
    use SoftDeletes;

    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'content', 'learning_style_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learningStyle()
    {
        return $this->belongsTo(\App\Models\LearningStyle::class, 'learning_style_id', 'id');
    }
    
}
