<?php

// src/AppBundle/Manager/UserManager.php
namespace AppBundle\Manager;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Tests\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserManager
{
    private $passwordEncoder;
    private $em;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager )
    {
        $this->passwordEncoder = $passwordEncoder ;
        $this->em = $entityManager;
    }

    public function createUser( $firstname, $lastname, $email, $password, $creatAt, $member_id)
    {
        $user = new User();
        $password = $this->passwordEncoder->encodePassword( $user, $password);
        $user
        ->setFirstname( $firstname)
        ->setLastname( $lastname)
        ->setEmail( $email)
        ->setPassword( $password)
        ->setCreatAt( $creatAt)
        ->setMemberId( $member_id);

        $this->em->persist($user);
        $this->em->flush();
    }

    public function getUsername()
    {
        return $this->em->getRepository( User:: class)
            ->findAll();
    }
}