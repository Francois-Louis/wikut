<?php

namespace App\Tests;

use App\Entity\Rank;
use PHPUnit\Framework\TestCase;

class RankUnitTest extends TestCase
{
    public function testRankTrue()
    {
        $rank = new Rank();

        $rank->setAccess(80);
        $rank->setName('rank');
        $rank->setbadge('gold');

        $this->assertTrue($rank->getAccess() === 80);
        $this->assertTrue($rank->getName() === 'rank');
        $this->assertTrue($rank->getbadge() === 'gold');
    }

    public function testRankFalse(): void
    {
        $rank = new Rank();

        $rank->setAccess(80);
        $rank->setName('rank');
        $rank->setbadge('gold');

        $this->assertFalse($rank->getAccess() === 10);
        $this->assertFalse($rank->getName() === 'wood');
        $this->assertFalse($rank->getbadge() === 'silver');
    }

    public function testRankEmpty()
    {
        $rank = new Rank();

        $this->assertEmpty($rank->getAccess());
        $this->assertEmpty($rank->getName());
        $this->assertEmpty($rank->getbadge());
    }
}
