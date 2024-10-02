<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GeoLocationController extends Controller
{
    public function getGeoInfo(Request $request)
    {
        $ipAddress = $request->input('ip_address');

        if (!filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            return response()->json(['error' => 'Invalid IP address'], 400);
        }

        $client = new Client();
        $apiKey = env('IPINFO_API_KEY'); 
        try {
            $response = $client->get("https://ipinfo.io/{$ipAddress}/geo?token={$apiKey}");
            $data = json_decode($response->getBody(), true);

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch geolocation data'], 500);
        }
    }
}