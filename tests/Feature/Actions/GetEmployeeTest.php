<?php

use App\Actions\GetEmployee;
use Illuminate\Support\Str;
use Saloon\Exceptions\Request\Statuses\NotFoundException;
use Saloon\Exceptions\SaloonException;

it('loads an employee\'s details from the wonde api', function(string $apiId, string $firstName, string $lastName) {

    expect(resolve(GetEmployee::class)->execute($apiId))
        ->id->toEqual($apiId)
        ->forename->toEqual($firstName)
        ->surname->toEqual($lastName);
})->with([
    ['A500460806', 'Selina', 'Andrews'],
    ['A921160679', 'Steven', 'Dumbell'],
    ['A593143780', 'Ruth', 'Hatchett'],
]);

it('throws an exception if the request failed for whatever reason', function(){
    resolve(GetEmployee::class)->execute(Str::random(5));
})->throws(SaloonException::class);
