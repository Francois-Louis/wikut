<?php

namespace App\Tests;

use App\Entity\Project;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    public function testProjectTrue()
    {
        $project = new Project();

        $project->setName('Project');
        $project->setSlug('project');
        $project->setDescription('Project is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $project->setScore(1);
        $project->setViews(1);

        $this->assertTrue($project->getName() === 'Project');
        $this->assertTrue($project->getSlug() === 'project');
        $this->assertTrue($project->getDescription() === 'Project is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $this->assertTrue($project->getScore() === 1);
        $this->assertTrue($project->getViews() === 1);
    }

    public function testProjectFalse(): void
    {
        $project = new Project();

        $project->setName('Project');
        $project->setSlug('project');
        $project->setDescription('Project is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $project->setScore(1);
        $project->setViews(1);

        $this->assertFalse($project->getName() === 'wood');
        $this->assertFalse($project->getSlug() === 'wood');
        $this->assertFalse($project->getDescription() === 'Wood is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $this->assertFalse($project->getScore() === 2);
        $this->assertFalse($project->getViews() === 2);
    }

    public function testProjectEmpty()
    {
        $project = new Project();

        $this->assertEmpty($project->getName());
        $this->assertEmpty($project->getSlug());
        $this->assertEmpty($project->getDescription());
        $this->assertEmpty($project->getScore());
        $this->assertEmpty($project->getViews());
    }
}
