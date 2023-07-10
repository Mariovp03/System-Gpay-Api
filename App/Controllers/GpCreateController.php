<?php

namespace Controller;

class GpCreateController extends Controller
{
    public function index()
    {
        $this->createView();
        $this->getCreateClient();
    }

    public function createView()
    {
        $pathHomeTreated = PATH_BASE_VIEW . "GpCreateView.php";
        echo $this->getView(
            $pathHomeTreated,
            [
                'data' => $this->getCreateClient(),
            ]
        );
    }

    public function getCreateClient()
    {
        $url = "https://api.sandbox.cloud.galaxpay.com.br/v2/customers";
        $authentication = $this->authentication();
        $response = "<h1 class='text-center'>SERVIÇO TEMPORARIAMENTE INDISPONÍVEL 503</h1>";
        if (!empty($authentication)) {
            $header = array("Authorization:" . $authentication['token_type'] . " " . $authentication['access_token']);
            $body = [];
            if (!empty($_POST)) {
                $myId = $_POST['myId'] ? $_POST['myId'] : "";
                $name = $_POST['name'] ? $_POST['name'] : "";
                $document = $_POST['document'] ? $_POST['document'] : "";
                $emails = $_POST['emails'] ? $_POST['emails'] : "";
                $body = [
                    "myId" => $myId,
                    "name" => $name,
                    "document" => $document,
                    "emails" => [
                        $emails
                    ],
                ];
            }
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_HTTPHEADER => $header,
                CURLOPT_POSTFIELDS => json_encode($body),
            ]);
            $response = curl_exec($curl);
            curl_close($curl);
        }
        $responseInArray = json_decode($response);
        return $responseInArray;
    }
}
