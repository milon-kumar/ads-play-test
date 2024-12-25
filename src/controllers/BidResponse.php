<?php

namespace App\Controllers;

use App\Models\Campaign;

class BidResponse
{
    /*
     * Generates a bid response based on the incoming bid request.
     * It matches the requested banner dimensions with available campaigns and creates a bid for each match.
     * For each valid campaign, a bid object is created containing details like price, creative ID, ad image, and more.
     * The resulting bid response is returned in the format required by the OpenRTB protocol.
     */
    public static function generate()
    {
        $bidResponse = [
            "id" => BidRequest::getId(),
            "seatbid" => []
        ];

        foreach (BidRequest::getImp() as $imp) {
            foreach (Campaign::campaignData() as $campaign) {
                $campaign_dimension = explode("x", $campaign['dimension']);
                $banner_width = $imp['banner']['w'];
                $banner_height = $imp['banner']['h'];
                if ($banner_width == $campaign_dimension[0] && $banner_height == $campaign_dimension[1]) {
                    $bidResponse['seatbid'][] = [
                        "bid" => [
                            [
                                "id" => $imp['id'],
                                "impid" => $imp['id'],
                                "price" => $campaign['price'],
                                "adid" => $campaign['creative_id'],
                                "nurl" => $campaign['url'],
                                "adm" => '<img src="' . $campaign['image_url'] . '" width="' . $banner_width . '" height="' . $banner_height . '" />',
                                "adomain" => [$campaign['advertiser']],
                                "iurl" => $campaign['image_url'],
                                "cid" => $campaign['campaignname'],
                                "crid" => $campaign['creative_id'],
                            ]
                        ]
                    ];
                }
            }
        }
        return $bidResponse;
    }
}