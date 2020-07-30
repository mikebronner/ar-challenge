<?php

namespace App\Http\Controllers\Api;

use App\Character;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class CharacterController extends Controller
{
    public function index(): Collection
    {
        if (request("name")) {
            return (new Character)
                ->getByName(request("name"));
        }

        return (new Character)
            ->get();
    }

    public function show(int $characterId = null): Character
    {
        return (new Character)
            ->find($characterId);
    }
}
