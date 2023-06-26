<?php

namespace Controller;

class Controller{

    public function getView($pathView, $paramVars){
        if(!file_exists($pathView)){
            die("A view não existe ou o caminho dela está errado!");
        }
        extract($paramVars);
        ob_start();
        require $pathView;
        return ob_get_clean();
    }

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

}