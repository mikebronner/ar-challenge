<?php

namespace App\Services;

class BreakingBadApi
{
    protected $baseUrl = "https://www.breakingbadapi.com/api/";

    protected function fetchData(string $endpoint): array
    {
        return json_decode(file_get_contents($this->baseUrl . $endpoint), true);
    }

    public function getCharacters(): array
    {
        return $this->fetchData("characters");
    }

    public function findCharacterById(int $characterId): array
    {
        return $this->fetchData("characters/{$characterId}")[0];
    }

    public function findCharactersByName(string $name): array
    {
        return $this->fetchData("characters?name={$name}");
    }

    public function getEpisodes(): array
    {
        return $this->fetchData("episodes");
    }

    public function findEpisode(int $episodeId): array
    {
        return $this->fetchData("episodes/{$episodeId}");
    }

    public function getQuotes(): array
    {
        return $this->fetchData("quotes");
    }

    public function getRandomQuoteByAuthor(string $author): array
    {
        $data = $this->fetchData("quote/random?author={$author}");
    
        if (! is_array($data)) {
            return [];
        }

        return $data[0];
    }

    public function getDeaths(): array
    {
        return $this->fetchData("deaths");
    }

    public function getDeathCountByCharacter(string $character): array
    {
        return $this->fetchData("death-count?name={$character}");
    }
}
