<?php

namespace Controller;

class HomeController extends Controller
{
    public function index(){
        $this->getViewHome();
    }

    // public function getDataApiStarWars(){
    //     $curl = curl_init();
    //     curl_setopt_array($curl, [
    //         CURLOPT_URL => "https://swapi.dev/api/people/1",
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_RETURNTRANSFER => true
    //     ]);
    //     $response = curl_exec($curl);
    //     curl_close($curl);
    //     return json_decode($response)->name;
    // }

    public function getViewHome(){
        $pathHomeTreated = PATH_BASE_VIEW . "HomeView.php";
        echo $this->getView(
            $pathHomeTreated ,
            [
                'nameComplet' =>  'Mário do Vale',
            ] 
        );
    }



}

?>