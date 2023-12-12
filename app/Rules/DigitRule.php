<?php

// app/Rules/DigitRule.php

// App\Rules\DigitRule.php

namespace App\Rules;

use Illuminate\Validation\Rule;

class DigitRule extends Rule
{
 public function passes($attribute, $value)
 {
  // Your validation logic here
  return is_numeric($value);
 }
 public function __toString()
 {
  return 'digits';
 }

 public function message()
 {
  return 'The :attribute must be a digit.';
 }
}
