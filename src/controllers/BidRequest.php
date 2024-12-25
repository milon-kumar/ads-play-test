<?php

namespace App\Controllers;
class BidRequest
{
    /*
     * BidRequest class is used to handle and retrieve data from a bid request.
     * It stores the bid request data and provides static methods to access key elements:
     * - getId(): Returns the unique ID of the bid request.
     * - getImp(): Returns the impressions (imp) data from the request.
     * - getCurrency(): Returns the currency code (cur) used in the bid request.
     * The class ensures easy access to bid request data throughout the application.
     */

    private static $data;

    public function __construct($data)
    {
        self::$data = $data;
    }

    public static function getId()
    {
        return self::$data['id'];
    }

    public static function getImp()
    {
        return self::$data['imp'];
    }

    public static function getCurrency()
    {
        return self::$data['cur'];
    }
}