<?php

namespace App;

use Jenssegers\Model\Model;

class Episode extends Model
{
    protected $casts = [
        "id" => "int",
        "season" => "int",
        "episode" => "int",
        "characters" => "array",
    ];
    protected $fillable = [
        "id",
        "title",
        "season",
        "episode",
        "air_date",
        "characters",
        "series",
    ];
}
