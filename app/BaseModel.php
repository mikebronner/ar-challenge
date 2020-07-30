<?php

namespace App;

use App\Services\BreakingBadApi;
use Illuminate\Support\Collection;
use Jenssegers\Model\Model;

abstract class BaseModel extends Model
{
    protected $breakingBadApi;

    public function __construct()
    {
        $this->breakingBadApi = new BreakingBadApi;
    }
}
