<?php
namespace App\Actions;

use App\GetEmployeeException;
use App\Http\Integrations\Wonde\Requests\GetEmployeeRequest;
use App\Http\Integrations\Wonde\WondeConnector;

class GetEmployee {

    public function execute(string $id): array
    {
        $response = (new GetEmployeeRequest($id))->send();

        if($response->failed()){
            $response->throw();
        }
        return $response->json('data');
    }

}
