<?php

namespace App\Http\Controllers\Api;

use App\Death;
use App\Http\Controllers\Controller;
use App\Quote;
use Illuminate\Support\Collection;

class QuoteController extends Controller
{
    public function show(string $author): Quote
    {
        return (new Quote)
            ->findRandomQuoteByAuthor($author);
    }
}
