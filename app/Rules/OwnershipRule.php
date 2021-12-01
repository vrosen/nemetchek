<?php

namespace App\Rules;

use App\Models\Todo;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class OwnershipRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $todo = Todo::find($value);
        return Auth::user()->id ===  $todo->user_id;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The todo list doesnt belongs to the user.';
    }
}
