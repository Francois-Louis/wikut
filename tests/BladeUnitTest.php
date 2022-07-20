<?php

namespace App\Tests;

use App\Entity\Blade;
use PHPUnit\Framework\TestCase;

class BladeUnitTest extends TestCase
{
    public function testBladeTrue()
    {
        $blade = new Blade();

        $blade->setName('Blade');
        $blade->setSlug('blade');
        $blade->setDescription('Blade is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');

        $this->assertTrue($blade->getName() === 'Blade');
        $this->assertTrue($blade->getSlug() === 'blade');
        $this->assertTrue($blade->getDescription() === 'Blade is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
    }

    public function testBladeFalse(): void
    {
        $blade = new Blade();

        $blade->setName('Blade');
        $blade->setSlug('blade');
        $blade->setDescription('Blade is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');

        $this->assertFalse($blade->getName() === 'wood');
        $this->assertFalse($blade->getSlug() === 'wood');
        $this->assertFalse($blade->getDescription() === 'Wood is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
    }

    public function testBladeEmpty()
    {
        $blade = new Blade();

        $this->assertEmpty($blade->getName());
        $this->assertEmpty($blade->getSlug());
        $this->assertEmpty($blade->getDescription());
    }
}
