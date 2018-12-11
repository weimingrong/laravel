<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BlogCreateRequest
 * @package App\Http\Requests
 * >>php artisan make:request BlogCreateRequest
 */
class BlogCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:20',
            'body'  =>  'required|min:30',
            'published_at' => 'required|date',
        ];
    }
}
