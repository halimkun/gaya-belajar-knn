<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssessmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $questions = \App\Models\Question::with('answers')->get();

        $rules = [
            'user_id' => 'required',
        ];

        foreach ($questions as $question) {
            $validFor = [
                'required',
            ];

            if ($question->type === 'numeric') {
                $validFor[] = 'numeric';
                $validFor[] = 'min:0';
                $validFor[] = 'max:100';
            }

            if ($question->type === 'choice' || $question->type === 'multiple_choice') {
                $validFor[] = 'in:' . implode(',', $question->answers->pluck('id')->toArray());
            }

            if ($question->type === 'boolean') {
                $validFor[] = 'boolean';
            }

            $rules[$question->type . "_" . ($question->id + 8)] = implode('|', $validFor);
        }

        return $rules;
    }
    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        $messages = [
            'user_id.required' => 'The user ID is required.',
        ];

        $questions = \App\Models\Question::with('answers')->get();

        foreach ($questions as $question) {

            $messages[$question->type . "_" . ($question->id + 8) . ".required"] = "This question is required.";

            if ($question->type === 'numeric') {
                $messages[$question->type . "_" . ($question->id + 8) . ".numeric"] = "This question must be a number.";
                $messages[$question->type . "_" . ($question->id + 8) . ".min"] = "This question must be at least 0.";
                $messages[$question->type . "_" . ($question->id + 8) . ".max"] = "This question may not be greater than 100.";
            }

            if ($question->type === 'choice' || $question->type === 'multiple_choice') {
                $messages[$question->type . "_" . ($question->id + 8) . ".in"] = "This question must be one of the available answers. you can't choose other answer.";
            }

            if ($question->type === 'boolean') {
                $messages[$question->type . "_" . ($question->id + 8) . ".boolean"] = "This question must indicate a true or false value.";
            }
        }

        return $messages;
    }
}
