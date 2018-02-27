<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 23/02/2018
 * Time: 13:58
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FilmFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $film = new Film();
        $film
            ->setAuthor('test')
            ->setCategory(0)
            ->setDate(new \DateTime())
            ->setDescription('test')
            ->setDuration(200)
            ->setTitle('test');
        $manager->persist($film);
        $manager->flush();

    }

}