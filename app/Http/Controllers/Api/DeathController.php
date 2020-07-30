<?php

namespace App\Http\Controllers\Api;

use App\Death;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class DeathController extends Controller
{
    public function index(): Collection
    {
        return (new Death)
            ->get();
    }

    public function show(int $deathId): int
    {
        return (new Death)
            ->find($deathId);
    }
}
