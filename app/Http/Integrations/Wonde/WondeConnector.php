<?php

namespace App\Http\Integrations\Wonde;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class WondeConnector extends Connector
{
    use AcceptsJson;

    public function __construct()
    {
        $this->withTokenAuth(config('services.wonde.token'));
    }

    /**
     * The Base URL of the API
     *
     * @return string
     */
    public function resolveBaseUrl(): string
    {
        return sprintf('https://api.wonde.com/v1.0/schools/%s', config('services.wonde.school_id'));
    }

    /**
     * Default headers for every request
     *
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    /**
     * Default HTTP client options
     *
     * @return string[]
     */
    protected function defaultConfig(): array
    {
        return [];
    }
}
