<?php

namespace App\DataFixtures\ORM;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAuthor extends Fixture
{
    const USER_PASSWORD = 'author';

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setFirstname('Valentin');
        $user->setLastname('Papin');
        $user->setEmail('author@exemple.org');
        $user->setIsAuthor(true);

        $password = $this->container->get('security.password_encoder')->encodePassword($user, self::USER_PASSWORD);
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}
