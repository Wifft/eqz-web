<?php
namespace JS\Core\Classes;

use Psr\Log\LogLevel;

use Exception;

final class ReCaptcha
{
    public static function checkResponse(string $response) : bool
    {
        try {
            $url = "https://www.google.com/recaptcha/api/siteverify";
            $fields = [
                "secret" => env("RECAPTCHA_SECRET_KEY"),
                "response" => $response,
                "remoteip" => request()->ip()
            ];

            $curlRequest = curl_init();

            curl_setopt($curlRequest, CURLOPT_URL, $url);
            curl_setopt($curlRequest, CURLOPT_POST, count($fields));
            curl_setopt($curlRequest, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($curlRequest);

            curl_close($curlRequest);

            $result = json_decode($result);

            return (bool) $result->success;
        } catch (Exception $e) {
            trace_log($e->getMessage(), LogLevel::ERROR);

            return false;
        }
    }
}
