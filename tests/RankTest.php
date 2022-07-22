<?php

namespace App\Tests;

use App\Entity\Rank;
use PHPUnit\Framework\TestCase;

class RankUnitTest extends TestCase
{
    public function testRankTrue()
    {
        $rank = new Rank();

        $rank->setName('Rank');
        $rank->setBadge('rank');
        $rank->setDescription('Rank is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $rank->setAccess(1);

        $this->assertTrue($rank->getName() === 'Rank');
        $this->assertTrue($rank->getBadge() === 'rank');
        $this->assertTrue($rank->getDescription() === 'Rank is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $this->assertTrue($rank->getAccess() === 1);
    }

    public function testRankFalse(): void
    {
        $rank = new Rank();

        $rank->setName('Rank');
        $rank->setBadge('rank');
        $rank->setDescription('Rank is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $rank->setAccess(1);

        $this->assertFalse($rank->getName() === 'wood');
        $this->assertFalse($rank->getBadge() === 'wood');
        $this->assertFalse($rank->getDescription() === 'Wood is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $this->assertFalse($rank->getAccess() === 2);
    }

    public function testRankEmpty()
    {
        $rank = new Rank();

        $this->assertEmpty($rank->getName());
        $this->assertEmpty($rank->getBadge());
        $this->assertEmpty($rank->getDescription());
        $this->assertEmpty($rank->getAccess());
    }
}
