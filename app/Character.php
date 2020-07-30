<?php

namespace App;

use Illuminate\Support\Collection;

class Character extends BaseModel
{
    protected $casts = [
        "id" => "int",
        "occupation" => "array",
        "category" => "array",
    ];
    protected $fillable = [
        "id",
        "name",
        "birthday",
        "occupation",
        "img",
        "status",
        "nickname",
        "appearance",
        "portrayed",
        "category",
    ];

    public function get(): Collection
    {
        return collect($this->breakingBadApi->getCharacters())
            ->map(function ($character) {
                return (new Character)->fill($character);
            });
    }

    public function find(int $characterId): self
    {
        return $this->fill(
            $this->breakingBadApi->findCharacterById($characterId)
        );
    }

    public function getByName(string $name): Collection
    {
        return collect($this->breakingBadApi->findCharactersByName($name))
            ->map(function ($character) {
                return (new Character)->fill($character);
            });
    }
}
