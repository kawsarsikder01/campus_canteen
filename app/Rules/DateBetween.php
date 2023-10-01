<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class DateBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pickupDate = Carbon::parse($value);
        $lastDate   =  Carbon::now()->addWeek();
        if($pickupDate >= now() && $pickupDate <= $lastDate)
        {
            true;
        }else{
            $fail('Plese Chose Date Between a Week From Now.');
        }
    }
}
