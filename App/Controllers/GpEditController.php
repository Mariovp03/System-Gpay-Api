<?php

namespace Controller;

class GpEditController extends Controller
{
    public function index()
    {
        $this->editView();
    }

    public function editView()
    {
        $pathHomeTreated = PATH_BASE_VIEW . "GpEditView.php";
        echo $this->getView(
            $pathHomeTreated,
            [
                'myId' => $this->getEditClient()->Customer->myId,
                'name' => $this->getEditClient()->Customer->name,
                'document' => $this->getEditClient()->Customer->document,
                'email' => $this->getEditClient()->Customer->emails[0],
            ]
        );
    }

    public function getEditClient()
    {
        $valueMyId = !empty($_GET['id']) ? $_GET['id'] : "";

        $url = !empty($_GET['id']) ? "https://api.sandbox.cloud.galaxpay.com.br/v2/customers/$valueMyId/myId" : "";

        $authentication = $this->authentication();

        $response = "<h1 class='text-center'>SERVIÇO TEMPORARIAMENTE INDISPONÍVEL 503</h1>";

        if (!empty($authentication)) {

            $header = array("Authorization:" . $authentication['token_type'] . " " . $authentication['access_token']);

            $body = [];

            if (!empty($_POST)) {
            
                $name = $_POST['name'] ? $_POST['name'] : "";

                $document = $_POST['document'] ? $_POST['document'] : "";

                $emails = $_POST['emails'] ? $_POST['emails'] : "";

                $body = [
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
                CURLOPT_CUSTOMREQUEST => 'PUT',
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
