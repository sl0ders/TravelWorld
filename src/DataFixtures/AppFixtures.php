<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Comment;
use App\Entity\Country;
use App\Entity\Icons;
use App\Entity\News;
use App\Entity\Picture;
use App\Entity\Smiley;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User;
        $password = $this->encoder->encodePassword($admin, 'Qu&ntin66270');
        $admin->setFirstname('Quentin');
        $admin->setLastname('Sommesous');
        $admin->setEmail('sl0ders@gmail.com');
        $admin->setPassword($password);
        $admin->setCreatedAt(new DateTime());
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $faker = Factory::create('fr_FR');

        for ($s = 1; $s <= 30; $s++) {
            $simpleUser = new User();
            $simpleUser->setPassword($this->encoder->encodePassword($admin, 'password'))
                ->setCreatedAt(new DateTime())
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setEmail($faker->email)
                ->setRoles(['ROLE_USER']);
            $manager->persist($simpleUser);
        }

        for ($il = 1; $il <= 3; $il++) {
            $iconLaught = new Icons();
            $iconLaught->setUrl($faker->imageUrl(10, 10))
                ->setCategory('Laught');
            $manager->persist($iconLaught);
        }

        for ($is = 1; $is <= 3; $is++) {
            $iconSad = new Icons();
            $iconSad->setUrl($faker->imageUrl(10, 10))
                ->setCategory('Sad');
            $manager->persist($iconSad);
        }

        for ($c = 1; $c <= 10; $c++) {
            $country = new Country();
            $country->setName($faker->country)
                ->setMap($faker->imageUrl('50', '50'));
            $manager->persist($country);

            for ($ci = 1; $ci <= 2; $ci++) {
                $city = new City();
                $city->setName($faker->city)
                    ->setMap($faker->imageUrl('50', '50'))
                    ->setCountry($country);
                $manager->persist($city);

                for ($p = 1; $p <= 2; $p++) {
                    $picture = new Picture();
                    $picture->setAuthor($admin)
                        ->setCreatedAt(new \DateTime())
                        ->setDescription($faker->text(500))
                        ->setTitle($faker->lastName)
                        ->setUrl($faker->imageUrl($width = 640, $height = 480))
                        ->setCity($city)
                        ->setTakenAt($faker->dateTimeBetween('2000-02-05', 'now'));
                    $manager->persist($picture);

                    for ($sm = 1; $sm <= 2; $sm++) {
                        $smiley = new Smiley();
                        $smiley->setPicture($picture)
                            ->setIcon($iconSad)
                            ->setUser($simpleUser);
                        $manager->persist($smiley);
                    }
                    for ($sm = 1; $sm <= 2; $sm++) {
                        $comment = new Comment();
                        $comment->setPicture($picture)
                            ->setUser($simpleUser)
                            ->setCreatedAt(new \DateTime)
                            ->setContent($faker->text(1000))
                            ->setEnable(1)
                            ->setParentId($faker->randomDigit);
                        $manager->persist($comment);
                    }

                    for ($n = 1; $n <= 1; $n++) {
                        $news = new News();
                        $news->setPicture($picture)
                            ->setContent($faker->text(1000))
                            ->setAuthor($admin)
                            ->setCreatedAt(new DateTime())
                            ->setTitle($picture->getTitle());
                        $manager->persist($news);
                    }
                }
            }
        }
        $manager->flush();
    }
}
