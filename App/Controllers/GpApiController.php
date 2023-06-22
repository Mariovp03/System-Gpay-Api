<?php

namespace Controller;

class GpApiController extends Controller
{
    public function authentication(){
        $galaxId = "5473";
        $galaxHash = "83Mw5u8988Qj6fZqS4Z8K7LzOo1j28S706R0BeFe";
        $urlToken = "https://api.sandbox.cloud.galaxpay.com.br/v2/token";
        $header =  array('Authorization: Basic ' . base64_encode( $galaxId . ':' . $galaxHash));
        $body = 
        '{
            "grant_type": "authorization_code",
            "scope": "customers.read customers.write plans.read plans.write transactions.read transactions.write webhooks.write cards.read cards.write card-brands.read subscriptions.read subscriptions.write charges.read charges.write boletos.read"
        }';
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $urlToken,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $header
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    public function list(){
        $this->listView();
        $this->getListClient();
    }
    
    public function listView(){
        $pathHomeTreated = PATH_BASE_VIEW . "ListApiView.php";
        echo $this->getView(
            $pathHomeTreated ,
            [
            'nameComplet' =>  'Mário do Vale',
            ] 
        );
    }

    public function getListClient(){
        $url = 'https://api.sandbox.cloud.galaxpay.com.br/v2/customers?startAt=0&limit=100';
        $authentication = $this->authentication();
        $header = array("Authorization:".$authentication['token_type']." ".$authentication['access_token']);
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $header,
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        print_r($response);
    }
}