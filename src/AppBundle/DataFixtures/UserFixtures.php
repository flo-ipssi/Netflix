<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname( 'jeremy');
        $user->setLastname( 'lejeune');
        $user->setEmail( 'jeremy@test.fr');
        $user->setPassword('$2y$10$M7O2jPQD7dywgAko2UJKJuY5t0h/N96Pbs7h5E9H5Ew6JbOdF9ffi');
        $user->setCreatat(new \DateTime());
        $user->setMemberid('1');

        $manager->persist($user);
        $manager->flush();
    }
}