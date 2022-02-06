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
        if ($value == null)
            return false;

        // localhost
        if (in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']))
            return true;


        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => env('RECAPTCHA_SECRET'),
            'response' => $value,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];

        curl_setopt($ch = curl_init(), CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);

        return $response->success;

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
