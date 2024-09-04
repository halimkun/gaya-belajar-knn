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
 *
 * @property LearningStyle $learningStyle
 * @package App
 * 
 */
class EducationalContent extends Model
{
    use SoftDeletes;

    protected $perPage = 20;

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
