<?php

namespace App\Tests;

use App\Entity\Picture;
use PHPUnit\Framework\TestCase;

class PictureTest extends TestCase
{
    public function testPictureTrue()
    {
        $picture = new Picture();

        $picture->setplace(80);
        $picture->setpath('picture');

        $this->assertTrue($picture->getplace() === 80);
        $this->assertTrue($picture->getpath() === 'picture');
    }

    public function testPictureFalse(): void
    {
        $picture = new Picture();

        $picture->setplace(80);
        $picture->setpath('picture');

        $this->assertFalse($picture->getplace() === 10);
        $this->assertFalse($picture->getpath() === 'wood');
    }

    public function testPictureEmpty()
    {
        $picture = new Picture();

        $this->assertEmpty($picture->getplace());
        $this->assertEmpty($picture->getpath());
    }
}
