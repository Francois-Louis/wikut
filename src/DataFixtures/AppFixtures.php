<?php

namespace App\DataFixtures;

use App\Entity\Blade;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Country;
use App\Entity\Handle;
use App\Entity\Picture;
use App\Entity\Project;
use App\Entity\Rank;
use App\Entity\Status;
use App\Entity\Style;
use App\Entity\User;
use App\Entity\Vote;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $admin = new User();

        $admin->setEmail('god@wikut.net');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPseudo('demiurge');
        $admin->setAvatar($faker->imageUrl(640, 480, 'cats'));
        $admin->setAbout($faker->text());
        $admin->setWebsite($faker->domainName());
        $admin->setCompany($faker->company());

        $adminPassword = $this->encoder->encodePassword($admin, 'admin');
        $admin->setPassword($adminPassword);

        $manager->persist($admin);

        $modo = new User();

        $modo->setEmail('modo@wikut.net');
        $modo->setRoles(['ROLE_MODO']);
        $modo->setPseudo('modo');
        $modo->setAvatar($faker->imageUrl(640, 480, 'cats'));
        $modo->setAbout($faker->text());
        $modo->setWebsite($faker->domainName());
        $modo->setCompany($faker->company());

        $modoPassword = $this->encoder->encodePassword($modo, 'modo');
        $modo->setPassword($modoPassword);

        $manager->persist($modo);

        $testor = new User();

        $testor->setEmail('testor@wikut.net');
        $testor->setRoles(['ROLE_USER']);
        $testor->setPseudo('testor');
        $testor->setAvatar($faker->imageUrl(640, 480, 'cats'));
        $testor->setAbout($faker->text());
        $testor->setWebsite($faker->domainName());
        $testor->setCompany($faker->company());

        $testorPassword = $this->encoder->encodePassword($testor, 'testor');
        $testor->setPassword($testorPassword);

        $manager->persist($testor);

        $manager->flush();
    }
}
