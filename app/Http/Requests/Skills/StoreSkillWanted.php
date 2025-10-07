<?php
namespace App\Http\Requests\Skills;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillWanted extends FormRequest
{

    // public function authorize(): bool
    // {
    //     return false;
    // }

    public function rules(): array
    {
        return [

            'skills' => 'required|string',
        ];
    }
}
