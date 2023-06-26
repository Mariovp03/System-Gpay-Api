<?php

namespace Controller;

class GpListController extends Controller
{
    public function list(){
        $this->listView();
    }
    
    public function listView(){
        $pathHomeTreated = PATH_BASE_VIEW . "ListApiView.php";
        echo $this->getView(
            $pathHomeTreated ,
            [
            'nameComplet' =>  'Mário do Vale',
            'list' => $this->getListClient()
            ] 
        );
    }

    public function getListClient(){
        $url = "https://api.sandbox.cloud.galaxpay.com.br/v2/customers?startAt=0&limit=100";
        $authentication = $this->authentication();
        $response = "<h1 class='text-center'>SERVIÇO TEMPORARIAMENTE INDISPONÍVEL 503</h1>";
        if(!empty($authentication)){
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
        }
       $responseInArray = json_decode($response);
       return $responseInArray;
    }
}