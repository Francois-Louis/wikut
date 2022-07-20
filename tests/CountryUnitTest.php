<?php

namespace App\Tests;

use App\Entity\Country;
use PHPUnit\Framework\TestCase;

class CountryUnitTest extends TestCase
{
    public function testCountryTrue()
    {
        $country = new Country();

        $country->setName('France');
        $country->setCcIso('FR');

        $this->assertTrue($country->getName() === 'France');
        $this->assertTrue($country->getCcIso() === 'FR');
    }

    public function testCountryFalse(): void
    {
        $country = new Country();

        $country->setName('France');
        $country->setCcIso('FR');

        $this->assertFalse($country->getName() === 'Samoa');
        $this->assertFalse($country->getCcIso() === 'DE');
    }

    public function testCountryEmpty()
    {
        $country = new Country();

        $this->assertEmpty($country->getName());
        $this->assertEmpty($country->getCcIso());
    }
}
