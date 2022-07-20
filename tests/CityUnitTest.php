<?php

namespace App\Tests;

use App\Entity\City;
use PHPUnit\Framework\TestCase;

class CityUnitTest extends TestCase
{
    public function testCityTrue()
    {
        $city = new City();

        $city->setName('City');
        $city->setLng(125.982);
        $city->setLat(96.3715);

        $this->assertTrue($city->getName() === 'City');
        $this->assertTrue($city->getLng() === 125.982);
        $this->assertTrue($city->getLat() === 96.3715);
    }

    public function testCityFalse(): void
    {
        $city = new City();

        $city->setName('City');
        $city->setLng(255.982);
        $city->setLat(98.3715);

        $this->assertFalse($city->getName() === 'wood');
        $this->assertFalse($city->getLng() === 125.982);
        $this->assertFalse($city->getLat() === 96.3715);
    }

    public function testCityEmpty()
    {
        $city = new City();

        $this->assertEmpty($city->getName());
        $this->assertEmpty($city->getLng());
        $this->assertEmpty($city->getLat());
    }
}
