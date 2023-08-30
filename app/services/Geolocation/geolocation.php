<?php

namespace App\services\Geolocation;

use App\services\map\map;
use App\services\satellite\satellite;

class geolocation
{
    private map $map;
    private satellite $satellite;

    public function __construct(map $map, satellite $satellite)
    {

        $this->map = $map;
        $this->satellite = $satellite;
    }

    public function search(string $name)
    {
      $locationInfo =  $this ->map->FindAddress('name');
      return $this->satellite->PinPoint(($locationInfo));
    }
}
