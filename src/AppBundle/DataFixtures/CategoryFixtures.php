<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 23/02/2018
 * Time: 13:58
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setGenre('Autres');
        $manager->persist($category);
        $manager->flush();
        $this->addReference('category', $category);

    }

}