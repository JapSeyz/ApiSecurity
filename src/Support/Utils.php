<?php

namespace JapSeyz\ApiSecurity\Support;

class Utils
{

    /**
     * @param int $time
     *
     * @return string
     */
    public static function generateAPIToken($time = null)
    {
        if (!$time) {
            $time = time();
        }
        $day = date('d', $time);

        // Hash the values to generate the token
        $token = hash('sha256', env('JAPSEYZ_API_TOKEN') . $time . $day);

        return $token;
    }


    public static function parseAPIToken($token)
    {
        for ($i = 0; $i < 6; $i++) {
            $time = time() - $i;
            $generatedToken = Utils::generateAPIToken($time);

            if ($generatedToken === $token) {
                return true;
            }
        }

        return false;
    }
}