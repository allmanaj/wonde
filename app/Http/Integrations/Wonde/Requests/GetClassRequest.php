<?php

namespace App\Http\Integrations\Wonde\Requests;

use App\Http\Integrations\Wonde\WondeConnector;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Request\HasConnector;

class GetClassRequest extends Request
{

    use HasConnector;

    protected string $connector = WondeConnector::class;


    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    public function __construct(protected string $classId)
    {
        //
    }
    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return sprintf('/classes/%s', $this->classId);
    }

    protected function defaultQuery(): array
    {
        return [
            'include' => 'students,lessons.period'
        ];
    }
}
