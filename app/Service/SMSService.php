<?php
namespace App\Service;

use Vonage\Client;
use Vonage\SMS\Message;
use Vonage\Client\Credentials\Basic;

class SMSService {
    public function formatPhoneNUmber($number)
    {
        if($number[0] == 0){
            return preg_replace('/^0/', '+234', $number);
        }
        return $number;
    }
    public function sendSMSTermil($phone_number, $message){
        $curl = curl_init();
        $data = array(
            "api_key" => "TLI66hO5NAS6ZMtvSG0kmcEtriKQomF6jl0JSScj8z7Sm7qh0RKJGhJqwezPfu",
            "to" => $this->formatPhoneNUmber($phone_number),
            "from" => 'SCS',
            "sms" => $message,
            "type" => "plain",
            "channel" => "generic"
        );

        $post_data = json_encode($data);

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.ng.termii.com/api/sms/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $post_data,
        CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // dd($response);
        return $response;
    }
    public function sendSMS($phone_number, $message)
    {
        $basic  = new Basic("720b136c", "4rbkN60oEgNvgVsq");
        $client = new Client($basic);

        $response = $client->sms()->send(
            new Message\SMS(
                $phone_number,
                config('app.name'),
                $message
                )
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
