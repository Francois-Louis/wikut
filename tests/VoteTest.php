<?php

namespace App\Tests;

use App\Entity\Vote;
use PHPUnit\Framework\TestCase;

class VoteTest extends TestCase
{
    public function testVoteTrue()
    {
        $vote = new Vote();

        $vote->setRate(2);

        $this->assertTrue($vote->getRate() === 2);
    }

    public function testVoteFalse(): void
    {
        $vote = new Vote();

        $vote->setRate(2);

        $this->assertFalse($vote->getRate() === 4);
    }

    public function testVoteEmpty()
    {
        $vote = new Vote();

        $this->assertEmpty($vote->getRate());
    }
}
