<?php

namespace App\Tests;

use App\Entity\Style;
use PHPUnit\Framework\TestCase;

class StyleUnitTest extends TestCase
{
    public function testStyleTrue()
    {
        $style = new Style();

        $style->setName('Style');
        $style->setSlug('style');
        $style->setDescription('Style is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');

        $this->assertTrue($style->getName() === 'Style');
        $this->assertTrue($style->getSlug() === 'style');
        $this->assertTrue($style->getDescription() === 'Style is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
    }

    public function testStyleFalse(): void
    {
        $style = new Style();

        $style->setName('Style');
        $style->setSlug('style');
        $style->setDescription('Style is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');

        $this->assertFalse($style->getName() === 'wood');
        $this->assertFalse($style->getSlug() === 'wood');
        $this->assertFalse($style->getDescription() === 'Wood is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
    }

    public function testStyleEmpty()
    {
        $style = new Style();

        $this->assertEmpty($style->getName());
        $this->assertEmpty($style->getSlug());
        $this->assertEmpty($style->getDescription());
    }
}
