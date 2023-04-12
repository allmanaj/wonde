<?php

use App\Actions\GetEmployee;
use Illuminate\Support\Str;
use Saloon\Exceptions\Request\Statuses\NotFoundException;
use Saloon\Exceptions\SaloonException;
use Saloon\Http\Faking\MockResponse;
use Saloon\Laravel\Facades\Saloon;

it('loads an employee\'s details from the wonde api', function(string $apiId, string $firstName, string $lastName) {

    Saloon::fake([
       MockResponse::fixture(sprintf('employee.%s', $apiId)),
    ]);

    expect(resolve(GetEmployee::class)->execute($apiId))
        ->id->toEqual($apiId)
        ->forename->toEqual($firstName)
        ->surname->toEqual($lastName);
})->with('employees');

it('throws an exception if the request failed for whatever reason', function(){
    Saloon::fake([
       MockResponse::fixture('employee.invalid'),
    ]);
    resolve(GetEmployee::class)->execute(Str::random(5));
})->throws(SaloonException::class);
