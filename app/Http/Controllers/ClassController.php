<?php

namespace App\Http\Controllers;

use App\Actions\GetClass;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClassController extends Controller
{
    public function show(GetClass $getClass, string $class)
    {
        return Inertia::render('Class', [
            'classData' => $getClass->execute($class)
        ]);
    }
}
