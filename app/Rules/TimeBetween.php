<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class TimeBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pickupDate = Carbon::parse($value);
        $pickUpTime = Carbon::createFromTime($pickupDate->hour,$pickupDate->minute,$pickupDate->second);
        $startTime = Carbon::createFromTimeString('10:00:00');
        $endTime = Carbon::createFromTimeString('22:00:00');
        if(!($pickUpTime->between($startTime,$endTime))){
            $fail('Please choose the time between 10:00-22:00.');
        }
    }
}
