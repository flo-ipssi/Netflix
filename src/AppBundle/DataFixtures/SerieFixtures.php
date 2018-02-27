<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 23/02/2018
 * Time: 13:58
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Serie;
use AppBundle\Entity\Series;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

class SerieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $serie = new Series();
        $serie
            ->setAuthor('test')
            ->setCategory(0)
            ->setDate(new \DateTime())
            ->setNumberEpisode(5)
            ->setDescription('test')
            ->setDuration(22)
            ->setTitle('test');
        $manager->persist($serie);
        $manager->flush();

    }

}