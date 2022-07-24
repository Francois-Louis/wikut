<?php

namespace App\Tests;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testCategoryTrue()
    {
        $category = new Category();

        $category->setName('Category');
        $category->setSlug('category');
        $category->setDescription('Category is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');

        $this->assertTrue($category->getName() === 'Category');
        $this->assertTrue($category->getSlug() === 'category');
        $this->assertTrue($category->getDescription() === 'Category is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
    }

    public function testCategoryFalse(): void
    {
        $category = new Category();

        $category->setName('Category');
        $category->setSlug('category');
        $category->setDescription('Category is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');

        $this->assertFalse($category->getName() === 'wood');
        $this->assertFalse($category->getSlug() === 'wood');
        $this->assertFalse($category->getDescription() === 'Wood is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
    }

    public function testCategoryEmpty()
    {
        $category = new Category();

        $this->assertEmpty($category->getName());
        $this->assertEmpty($category->getSlug());
        $this->assertEmpty($category->getDescription());
    }
}
