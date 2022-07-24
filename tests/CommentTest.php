<?php

namespace App\Tests;

use App\Entity\Comment;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    public function testCommentTrue()
    {
        $comment = new Comment();
        $date = new \DateTimeImmutable();

        $comment->setContent("blabla");

        $this->assertTrue($comment->getContent() === "blabla");
    }

    public function testCommentFalse(): void
    {
        $comment = new Comment();

        $comment->setContent("blabla");

        $this->assertFalse($comment->getContent() === "patati");
    }

    public function testCommentEmpty()
    {
        $comment = new Comment();

        $this->assertEmpty($comment->getContent());
    }
}
