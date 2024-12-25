<?php

namespace App\Controllers;

class JsonResponse
{
    /*
     * JsonResponse class provides a method to send JSON responses with a specified HTTP status code.
     * - send(): Outputs the provided data as a JSON response with the given status code (default is 200).
     * The method sets the Content-Type header to "application/json" and ensures the response is properly formatted.
     */
    public static function send($data, $statusCode = 200) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit;
    }
}