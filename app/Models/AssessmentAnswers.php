<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentAnswers extends Model
{
    use HasFactory;

    protected $table = 'assessment_answers';

    protected $fillable = [
        'assessment_id',
        'question_id',
        'answer_id',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessments::class);
    }

    public function question()
    {
        return $this->belongsTo(Questions::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answers::class);
    }
}
