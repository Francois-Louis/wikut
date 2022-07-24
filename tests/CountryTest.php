<?php

namespace App\Tests;

use App\Entity\Country;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    public function testCountryTrue()
    {
        $country = new Country();

        $country->setLabelFr('France');
        $country->setLabelEn('France');
        $country->setLabelEs('Francia');
        $country->setLang('fr');
        $country->setCode('FR');

        $this->assertTrue($country->getLabelFr() === 'France');
        $this->assertTrue($country->getLabelEn() === 'France');
        $this->assertTrue($country->getLabelEs() === 'Francia');
        $this->assertTrue($country->getLang() === 'fr');
        $this->assertTrue($country->getCode() === 'FR');
    }

    public function testCountryFalse(): void
    {
        $country = new Country();

        $country->setLabelFr('France');
        $country->setLabelEn('France');
        $country->setLabelEs('Francia');
        $country->setLang('fr');
        $country->setCode('FR');

        $this->assertFalse($country->getLabelFr() === 'Samoa');
        $this->assertFalse($country->getLabelEn() === 'Samoa');
        $this->assertFalse($country->getLabelEs() === 'Samoa');
        $this->assertFalse($country->getLang() === 'en');
        $this->assertFalse($country->getCode() === 'DE');
    }

    public function testCountryEmpty()
    {
        $country = new Country();

        $this->assertEmpty($country->getLabelFr());
        $this->assertEmpty($country->getLabelEn());
        $this->assertEmpty($country->getLabelEs());
        $this->assertEmpty($country->getLang());
        $this->assertEmpty($country->getCode());
    }
}
