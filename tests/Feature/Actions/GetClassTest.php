<?php

use App\Actions\GetClass;
use App\Actions\GetEmployee;
use Illuminate\Support\Str;
use Saloon\Exceptions\Request\Statuses\NotFoundException;
use Saloon\Exceptions\SaloonException;
use Saloon\Http\Faking\MockResponse;
use Saloon\Laravel\Facades\Saloon;

it('loads a class\' details from the wonde api', function(string $apiId, string $firstName) {

    Saloon::fake([
       MockResponse::fixture(sprintf('class.%s', $apiId)),
    ]);

    expect(resolve(GetClass::class)->execute($apiId))
        ->id->toEqual($apiId)
        ->name->toEqual($firstName);
})->with([
    ['A946948345', '10A/Ar1'],
    ['A1047915664', '10A/Ci'],
    ['A879263787', '10A/Dr1'],
]);

it('throws an exception if the request failed for whatever reason', function(){
    Saloon::fake([
       MockResponse::fixture('class.invalid'),
    ]);
    resolve(GetEmployee::class)->execute(Str::random(5));
})->throws(SaloonException::class);
