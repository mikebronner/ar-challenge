<?php

namespace App;

use Illuminate\Support\Collection;

class Death extends BaseModel
{
    protected $casts = [
        "id" => "int",
        "season" => "int",
        "episode" => "int",
        "number_of_deaths" => "int",
    ];
    protected $fillable = [
        "id",
        "death",
        "cause",
        "responsible",
        "last_words",
        "season",
        "episode",
        "number_of_deaths",
    ];

    public function get(): Collection
    {
        return collect($this->breakingBadApi->getDeaths())
            ->map(function ($death) {
                return (new Death)->fill($death);
            });
    }

    public function getDeathCountByCharacter(string $character): int
    {
        return $this->breakingBadApi->getDeathCountByCharacter($character);
    }

}
