<?php

namespace App\DataFixtures\ORM;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTag extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tag = new Tag("Science","science");
        $manager->persist($tag);
        $manager->flush();

        $tag = new Tag("Littérature","litterature");
        $manager->persist($tag);
        $manager->flush();

        $tag = new Tag("Sport","sport");
        $manager->persist($tag);
        $manager->flush();
    }
}
