<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Inertia\Testing\AssertableInertia;
use Saloon\Http\Faking\MockResponse;
use Saloon\Laravel\Facades\Saloon;

beforeEach(fn() => Artisan::call('migrate:fresh --seed'));

it('loads the class page with correct data', function(string $classId, string $name, int $classSize) {

    Saloon::fake([
       MockResponse::fixture(sprintf('class.%s', $classId)),
    ]);

    $user = User::factory()->create([
        'api_id' => 'A500460806',
        'name' => 'Selina Andrews'
    ]);

    $this->actingAs($user)->get(route('class.show', $classId))
        ->assertInertia(fn(AssertableInertia $page) => $page
            ->component('Class')
            ->has('classData', fn(AssertableInertia $page) => $page
                ->where('name', $name)
                ->where('id', $classId)
                ->has('mis_id')
                ->has('code')
                ->has('description')
                ->has('subject')
                ->has('alternative')
                ->has('restored_at')
                ->has('created_at')
                ->has('updated_at')
                ->has('meta')
                ->has('students.data', $classSize)
            )
        );
})->with('classes');
