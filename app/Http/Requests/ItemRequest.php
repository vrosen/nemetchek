<?php

namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\OwnershipRule;

class ItemRequest extends FormRequest
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
            'todo_id' =>'required|exists:todos,id',
            'name' => 'required|max:100',
            'description' => 'required|max:500',
            'todo_id' => [new OwnershipRule]
        ];
    }
}

