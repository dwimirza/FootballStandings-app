<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Score;


class UniqueMatch implements Rule
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
        [$club1, $club2, $score1, $score2] = $value;

        // Check if the match already exists in the scores table
        $matchExists = Score::where(function ($query) use ($club1, $club2) {
            $query->where('club1', $club1)->where('club2', $club2);
        })->orWhere(function ($query) use ($club1, $club2) {
            $query->where('club1', $club2)->where('club2', $club1);
        })->exists();

        // Return false if the match already exists, true otherwise
        return !$matchExists;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
