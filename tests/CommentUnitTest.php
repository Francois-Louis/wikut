<?php

namespace App\Tests;

use App\Entity\Comment;
use PHPUnit\Framework\TestCase;

class CommentUnitTest extends TestCase
{
    public function testCommentTrue()
    {
        $comment = new Comment();
        $date = new \DateTimeImmutable();

        $comment->setContent("blabla");
        $comment->getPostedAt($date);
        $comment->getModifiedAt($date);

        $this->assertTrue($comment->getContent() === "blabla");
        $this->assertTrue($comment->getPostedAt() === $date);
        $this->assertTrue($comment->getModifiedAt() === $date);
    }

    public function testCommentFalse(): void
    {
        $comment = new Comment();
        $date = new \DateTimeImmutable();

        $comment->setContent("blabla");
        $comment->getPostedAt($date);
        $comment->getModifiedAt($date);

        $this->assertFalse($comment->getContent() === "patati");
        $this->assertFalse($comment->getPostedAt() === "07/07/2020");
        $this->assertFalse($comment->getModifiedAt() === "07/07/2020");
    }

    public function testCommentEmpty()
    {
        $comment = new Comment();

        $this->assertEmpty($comment->getContent());
        $this->assertEmpty($comment->getPostedAt());
        $this->assertEmpty($comment->getModifiedAt());
    }
}
