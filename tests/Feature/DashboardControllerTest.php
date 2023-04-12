<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Inertia\Testing\Assert;
use Inertia\Testing\AssertableInertia;
use Saloon\Http\Faking\MockResponse;
use Saloon\Laravel\Facades\Saloon;

beforeEach(fn() => Artisan::call('migrate:fresh --seed'));

it('loads the dashboard with correct data', function(string $apiId, string $firstName, string $lastName, int $classCount) {

    Saloon::fake([
       MockResponse::fixture(sprintf('employee.%s', $apiId)),
    ]);

    $user = User::factory()->create([
        'api_id' => $apiId,
        'name' => sprintf('%s %s', $firstName, $lastName)
    ]);

    $this->actingAs($user)->get(route('dashboard'))
        ->assertInertia(fn(AssertableInertia $page) => $page
            ->component('Dashboard')
            ->has('employee', fn(AssertableInertia $page) => $page
                ->where('id', $apiId)
                ->where('forename', $firstName)
                ->where('surname', $lastName)
                ->has('upi')
                ->has('mis_id')
                ->has('initials')
                ->has('title')
                ->has('middle_names')
                ->has('legal_surname')
                ->has('legal_forename')
                ->has('gender')
                ->has('date_of_birth')
                ->has('restored_at')
                ->has('updated_at')
                ->has('created_at')
                ->has('classes.data', $classCount)
            )
        );
})->with('employees');
