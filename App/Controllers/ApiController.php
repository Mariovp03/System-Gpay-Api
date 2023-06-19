<?php

namespace Controller;

class ApiController extends Controller
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
            ] 
        );
    }

}