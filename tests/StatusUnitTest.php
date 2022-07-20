<?php

namespace App\Tests;

use App\Entity\Status;
use PHPUnit\Framework\TestCase;

class StatusUnitTest extends TestCase
{
    public function testStatusTrue()
    {
        $status= new Status();

        $status->setName('Status');
        $status->setDescription('Status is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');

        $this->assertTrue($status->getName() === 'Status');
        $this->assertTrue($status->getDescription() === 'Status is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
    }

    public function testStatusFalse(): void
    {
        $status= new Status();

        $status->setName('Status');
        $status->setDescription('Status is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');

        $this->assertFalse($status->getName() === 'wood');
        $this->assertFalse($status->getDescription() === 'Wood is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
    }

    public function testStatusEmpty()
    {
        $status= new Status();

        $this->assertEmpty($status->getName());
        $this->assertEmpty($status->getDescription());
    }
}
