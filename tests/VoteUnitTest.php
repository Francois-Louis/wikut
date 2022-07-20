<?php

namespace App\Tests;

use App\Entity\Vote;
use PHPUnit\Framework\TestCase;

class VoteUnitTest extends TestCase
{
    public function testVoteTrue()
    {
        $vote = new Vote();
        $date = new \DateTimeImmutable();

        $vote->setRate(2);
        $vote->setVotedAt($date);

        $this->assertTrue($vote->getRate() === 2);
        $this->assertTrue($vote->getVotedAt() === $date);
    }

    public function testVoteFalse(): void
    {
        $vote = new Vote();
        $date = new \DateTimeImmutable();

        $vote->setRate(2);
        $vote->setVotedAt($date);

        $this->assertFalse($vote->getRate() === 4);
        $this->assertFalse($vote->getVotedAt() === "07/07/2020");
    }

    public function testVoteEmpty()
    {
        $vote = new Vote();

        $this->assertEmpty($vote->getRate());
        $this->assertEmpty($vote->getVotedAt());
    }
}
