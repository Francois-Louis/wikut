<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testUserTrue()
    {
        $user = new User();

        $user->setPseudo('User');
        $user->setSlug('user');
        $user->setAbout('User is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $user->setEmail('toto@gmail.com');
        $user->setFacebook('https://www.facebook.com/toto');
        $user->setInstagram('https://www.instagram.com/toto');
        $user->setWebsite('https://www.toto.com');
        $user->setAvatar('https://www.toto.com/avatar.jpg');
        $user->setScore(0);
        $user->setCompany('Toto');

        $this->assertTrue($user->getPseudo() === 'User');
        $this->assertTrue($user->getSlug() === 'user');
        $this->assertTrue($user->getAbout() === 'User is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $this->assertTrue($user->getEmail() === 'toto@gmail.com');
        $this->assertTrue($user->getFacebook() === 'https://www.facebook.com/toto');
        $this->assertTrue($user->getInstagram() === 'https://www.instagram.com/toto');
        $this->assertTrue($user->getWebsite() === 'https://www.toto.com');
        $this->assertTrue($user->getAvatar() === 'https://www.toto.com/avatar.jpg');
        $this->assertTrue($user->getScore() === 0);
        $this->assertTrue($user->getCompany() === 'Toto');
    }

    public function testUserFalse(): void
    {
        $user = new User();

        $user->setPseudo('User');
        $user->setSlug('user');
        $user->setAbout('User is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $user->setEmail('toto@gmail.com');
        $user->setFacebook('https://www.facebook.com/toto');
        $user->setInstagram('https://www.instagram.com/toto');
        $user->setWebsite('https://www.toto.com');
        $user->setAvatar('https://www.toto.com/avatar.jpg');
        $user->setScore(0);
        $user->setCompany('Toto');

        $this->assertFalse($user->getPseudo() === 'wood');
        $this->assertFalse($user->getSlug() === 'wood');
        $this->assertFalse($user->getAbout() === 'Wood is a fictional character, a member of the fictional species of the Star Wars franchise, created by the designer J.R.R. Tolkien.');
        $this->assertFalse($user->getEmail() === 'dark@vador.gx');
        $this->assertFalse($user->getFacebook() === 'https://www.facebook.com/dark');
        $this->assertFalse($user->getInstagram() === 'https://www.instagram.com/dark');
        $this->assertFalse($user->getWebsite() === 'https://www.dark.com');
        $this->assertFalse($user->getAvatar() === 'https://www.dark.com/avatar.jpg');
        $this->assertFalse($user->getScore() === 1);
        $this->assertFalse($user->getCompany() === 'Dark');
    }

    public function testUserEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getPseudo());
        $this->assertEmpty($user->getSlug());
        $this->assertEmpty($user->getAbout());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getFacebook());
        $this->assertEmpty($user->getInstagram());
        $this->assertEmpty($user->getWebsite());
        $this->assertEmpty($user->getAvatar());
        $this->assertEmpty($user->getScore());
        $this->assertEmpty($user->getCompany());
    }
}
