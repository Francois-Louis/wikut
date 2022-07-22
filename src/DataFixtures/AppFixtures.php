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

        //création de 5 blades
        for ($i = 0; $i < 5; $i++) {
            $blade = new Blade();

            $blade->setName($faker->word());
            $blade->setDescription($faker->sentence(15));
            $blade->setCreatedAt($faker->dateTimeBetween('-6 months'));

            $manager->persist($blade);
        }

        //création de 5 handles
        for ($i = 0; $i < 5; $i++) {
            $handle = new Handle();

            $handle->setName($faker->word());
            $handle->setDescription($faker->sentence(15));
            $handle->setCreatedAt($faker->dateTimeBetween('-6 months'));

            $manager->persist($handle);
        }

        //création de 5 styles
        for ($i = 0; $i < 5; $i++) {
            $style = new Style();

            $style->setName($faker->word());
            $style->setDescription($faker->sentence(15));
            $style->setCreatedAt($faker->dateTimeBetween('-6 months'));

            $manager->persist($style);
        }

        //création de 5 categories
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();

            $category->setName($faker->word());
            $category->setDescription($faker->sentence(15));
            $category->setCreatedAt($faker->dateTimeBetween('-6 months'));

            $manager->persist($category);
        }

        //création de 5 ranks
        for ($i = 0; $i < 5; $i++) {
            $rank = new Rank();

            $rank->setAccess($faker->numberBetween(0, 100));
            $rank->setName($faker->word());
            $rank->setDescription($faker->sentence(15));
            $rank->setBadge($faker->imageUrl(640, 480, 'technics'));
            $rank->setCreatedAt($faker->dateTimeBetween('-6 months'));

            $manager->persist($rank);
        }

        //création de 3 statuts
        for ($i = 0; $i < 3; $i++) {
            $status = new Status();

            $status->setName($faker->word());
            $status->setDescription($faker->sentence(15));
            $status->setCreatedAt($faker->dateTimeBetween('-6 months'));

            $manager->persist($status);
        }

        //création de 3 countries
        for ($i = 0; $i < 3; $i++) {
            $country = new Country();

            $country->setCode($faker->countryCode());
            $country->setLang($faker->languageCode());
            $country->setLabelEn($faker->country());
            $country->setLabelFr($faker->country());
            $country->setLabelEs($faker->country());
            $country->setCreatedAt($faker->dateTimeBetween('-6 months'));

            $manager->persist($country);
        }

        $admin = new User();

        $admin->setEmail('god@wikut.net');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPseudo('demiurge');
        $admin->setAvatar($faker->imageUrl(640, 480, 'cats'));
        $admin->setAbout($faker->text());
        $admin->setWebsite($faker->domainName());
        $admin->setCompany($faker->company());
        $admin->setCountry($faker->randomElement([$country]));
        $admin->setStatus($faker->randomElement([$status]));

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
        $modo->setCountry($faker->randomElement([$country]));
        $modo->setStatus($faker->randomElement([$status]));

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
        $testor->setCountry($faker->randomElement([$country]));
        $testor->setStatus($faker->randomElement([$status]));

        $testorPassword = $this->encoder->encodePassword($testor, 'testor');
        $testor->setPassword($testorPassword);

        $manager->persist($testor);

        //création de 10 users
        for ($i = 0; $i < 10; $i++) {
            $user = new User();

            $user->setEmail($faker->email());
            $user->setRoles(['ROLE_USER']);
            $user->setPseudo($faker->userName());
            $user->setAvatar($faker->imageUrl(640, 480, 'cats'));
            $user->setAbout($faker->text());
            $user->setWebsite($faker->domainName());
            $user->setCompany($faker->company());
            $user->setCountry($faker->randomElement([$country]));
            $user->setStatus($faker->randomElement([$status]));
            $user->setCreatedAt($faker->dateTimeBetween('-6 months'));

            $userPassword = $this->encoder->encodePassword($user, 'user');
            $user->setPassword($userPassword);

            $manager->persist($user);
        }

        //création de 35 projects
        for ($i = 0; $i < 35; $i++) {
            $project = new Project();

            $project->setName($faker->word(2));
            $project->setDescription($faker->text());
            $project->setUser($faker->randomElement([$user]));
            $project->setCategory($faker->randomElement([$category]));
            $project->setBlade($faker->randomElement([$blade]));
            $project->setCreatedAt($faker->dateTimeBetween('-6 months', 'now'));

            $manager->persist($project);
        }

        //création de 120 pictures
        for ($i = 0; $i < 120; $i++) {
            $picture = new Picture();

            $picture->setProject($faker->randomElement([$project]));
            $picture->setPath($faker->imageUrl(640, 480, 'nature'));
            $picture->setPlace($faker->numberBetween(1, 4));
            $picture->setCreatedAt($faker->dateTimeBetween('-6 months', 'now'));

            $manager->persist($picture);
        }

        //création de 250 votes
        for ($i = 0; $i < 250; $i++) {
            $vote = new Vote();

            $vote->setRate($faker->numberBetween(1, 5));
            $vote->setUser($faker->randomElement([$user]));
            $vote->setProject($faker->randomElement([$project]));
            $vote->setCreatedAt($faker->dateTimeBetween('-6 months', 'now'));

            $manager->persist($vote);
        }

        //création de 90 comments
        for ($i = 0; $i < 90; $i++) {
            $comment = new Comment();

            $comment->setUser($faker->randomElement([$user]));
            $comment->setProject($faker->randomElement([$project]));
            $comment->setContent($faker->text());
            $comment->setCreatedAt($faker->dateTimeBetween('-6 months', 'now'));

            $manager->persist($comment);
        }

        $manager->flush();
    }
}
