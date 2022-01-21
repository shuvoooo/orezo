<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // localhost
        if (in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']))
            return true;


        $recaptcha = new \ReCaptcha\ReCaptcha(env('RECAPTCHA_SECRET'));

        $resp = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);

        return $resp->isSuccess();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The recaptcha verification failed.';
    }
}
