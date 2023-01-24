<?php 

namespace Api\Controller;

use Api\Model\ApiRest;

class ApiService
{

    public function get()
    {
       ApiRest::api();
    }

}
