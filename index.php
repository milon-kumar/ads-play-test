<?php
require_once "vendor/autoload.php";

use App\Controllers\BidRequest;
use App\Controllers\BidResponse;
use App\Controllers\JsonResponse;
use App\Models\Request;

// Initialize BidRequest with bid data from the Request model
new BidRequest(Request::bidRequestData());


// Generate the bid response and send it as a JSON response
JsonResponse::send(BidResponse::generate());
