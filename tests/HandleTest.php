<?php

namespace App\Tests;

use App\Entity\Handle;
use PHPUnit\Framework\TestCase;

class HandleTest extends TestCase
{
    public function testHandleTrue()
    {
        $handle = new Handle();

        $handle->setName('Handle');
        $handle->setSlug('handle');
        $handle->setDescription('Handle is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');

        $this->assertTrue($handle->getName() === 'Handle');
        $this->assertTrue($handle->getSlug() === 'handle');
        $this->assertTrue($handle->getDescription() === 'Handle is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
    }

    public function testHandleFalse(): void
    {
        $handle = new Handle();

        $handle->setName('Handle');
        $handle->setSlug('handle');
        $handle->setDescription('Handle is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');

        $this->assertFalse($handle->getName() === 'wood');
        $this->assertFalse($handle->getSlug() === 'wood');
        $this->assertFalse($handle->getDescription() === 'Wood is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
    }

    public function testHandleEmpty()
    {
        $handle = new Handle();

        $this->assertEmpty($handle->getName());
        $this->assertEmpty($handle->getSlug());
        $this->assertEmpty($handle->getDescription());
    }
}
