<?php

namespace App\Http\Controllers;

use App\Actions\GetEmployee;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(GetEmployee $request): Response
    {

        return Inertia::render('Dashboard', [
            'employee' => $request->execute(auth()->user()->api_id)
        ]);
    }
}
