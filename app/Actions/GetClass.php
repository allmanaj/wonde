<?php
namespace App\Actions;

use App\GetEmployeeException;
use App\Http\Integrations\Wonde\Requests\GetClassRequest;
use App\Http\Integrations\Wonde\Requests\GetEmployeeRequest;
use App\Http\Integrations\Wonde\WondeConnector;

class GetClass {

    public function execute(string $id): array
    {
        $response = (new GetClassRequest($id))->send();

        if($response->failed()){
            $response->throw();
        }
        return $response->json('data');
    }

}
