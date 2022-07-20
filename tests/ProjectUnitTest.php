<?php

namespace App\Tests;

use App\Entity\Project;
use PHPUnit\Framework\TestCase;

class ProjectUnitTest extends TestCase
{
    public function testProjectTrue()
    {
        $project = new Project();
        $date = new \DateTimeImmutable();

        $project->setName('Project');
        $project->setSlug('project');
        $project->setDescription('Project is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $project->setCraftedAt($date);
        $project->setModifiedAt($date);
        $project->setScore(1);
        $project->setViews(1);

        $this->assertTrue($project->getName() === 'Project');
        $this->assertTrue($project->getSlug() === 'project');
        $this->assertTrue($project->getDescription() === 'Project is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $this->assertTrue($project->getCraftedAt() === $date);
        $this->assertTrue($project->getModifiedAt() === $date);
        $this->assertTrue($project->getScore() === 1);
        $this->assertTrue($project->getViews() === 1);
    }

    public function testProjectFalse(): void
    {
        $project = new Project();
        $date = new \DateTimeImmutable();

        $project->setName('Project');
        $project->setSlug('project');
        $project->setDescription('Project is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $project->setCraftedAt($date);
        $project->setModifiedAt($date);
        $project->setScore(1);
        $project->setViews(1);

        $this->assertFalse($project->getName() === 'wood');
        $this->assertFalse($project->getSlug() === 'wood');
        $this->assertFalse($project->getDescription() === 'Wood is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $this->assertFalse($project->getCraftedAt() === "26/07/1988");
        $this->assertFalse($project->getModifiedAt() === "06/09/2005");
        $this->assertFalse($project->getScore() === 2);
        $this->assertFalse($project->getViews() === 2);
    }

    public function testProjectEmpty()
    {
        $project = new Project();

        $this->assertEmpty($project->getName());
        $this->assertEmpty($project->getSlug());
        $this->assertEmpty($project->getDescription());
        $this->assertEmpty($project->getCraftedAt());
        $this->assertEmpty($project->getModifiedAt());
        $this->assertEmpty($project->getScore());
        $this->assertEmpty($project->getViews());
    }
}
