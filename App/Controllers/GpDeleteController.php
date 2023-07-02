<?php

namespace Controller;

class GpDeleteController extends Controller
{
    public function index()
    {
        $this->deleteView();
        $this->deleteClient();
    }

    public function deleteView()
    {
        $pathHomeTreated = PATH_BASE_VIEW . "GpDeleteView.php";
        echo $this->getView(
            $pathHomeTreated,
            [
                'myId' => $this->showClientDeleted()->Customers[0]->myId,
                'name' => $this->showClientDeleted()->Customers[0]->name,
                'document' => $this->showClientDeleted()->Customers[0]->document,
                'email' => $this->showClientDeleted()->Customers[0]->emails[0],
            ]
        );
    }

    public function showClientDeleted()
    {
        $valueMyId = !empty($_GET['id']) ? $_GET['id'] : "";
        
        $url = !empty($_GET['id']) ? "https://api.sandbox.cloud.galaxpay.com.br/v2/customers?myIds=$valueMyId&startAt=0&limit=1" : "";
        $authentication = $this->authentication();

        $response = "<h1 class='text-center'>SERVIÇO TEMPORARIAMENTE INDISPONÍVEL 503</h1>";

        if (!empty($authentication)) {

            $header = array("Authorization:" . $authentication['token_type'] . " " . $authentication['access_token']);

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

    public function deleteClient()
    {
        $valueMyId = !empty($_GET['id']) ? $_GET['id'] : "";

        $url = !empty($_GET['id']) ? "https://api.sandbox.cloud.galaxpay.com.br/v2/customers/$valueMyId/myId" : "";

        $authentication = $this->authentication();

        $response = "<h1 class='text-center'>SERVIÇO TEMPORARIAMENTE INDISPONÍVEL 503</h1>";

        if (!empty($authentication)) {

            $header = array("Authorization:" . $authentication['token_type'] . " " . $authentication['access_token']);

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'DELETE',
                CURLOPT_HTTPHEADER => $header,
            ]);

            $response = curl_exec($curl);

            curl_close($curl);
        }
        $responseInArray = json_decode($response);

        return $responseInArray;
    }
}
