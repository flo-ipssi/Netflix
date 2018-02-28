<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 23/02/2018
 * Time: 13:58
 */
namespace AppBundle\DataFixtures;
use AppBundle\Entity\Films;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
class FilmFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $film = new Films();
        $film
            ->setAuthor('jack')
            ->setCategory(0)
            ->setDate(new \DateTime())
            ->setDescription('c est un film')
            ->setDuration(200)
            ->setTitle('le test 1')
            ->setBrochure('../../abcd.jpeg');
        $manager->persist($film);
        $manager->flush();
    }
}