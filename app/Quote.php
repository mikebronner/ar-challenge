<?php

namespace App;

class Quote extends BaseModel
{
    protected $casts = [
        "quote_id" => "int",
    ];
    protected $fillable = [
        "quote_id",
        "quote",
        "author",
        "series",
    ];

    public function findRandomQuoteByAuthor(string $author): self
    {
        return $this->fill(
            $this->breakingBadApi->getRandomQuoteByAuthor($author)
        );
    }
}
