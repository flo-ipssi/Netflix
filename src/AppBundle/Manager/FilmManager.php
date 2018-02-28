<?php
namespace AppBundle\Manager;

use AppBundle\Entity\Film;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;

class FilmManager {
    /** @var EntityManagerInterface */
    private $em;
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }
    public function createUser(Film $film)
    {
        $film
            ->setTitle($film->getTitle())
            ->setAuthor( $film->getAuthor())
            ->setDate( $film->getDate())
            ->setCategory( $film->getCategory())
            ->setDescription( $film->getDescription())
            ->setBrochure( $film->getBrochure())
            ->setDuration( $film->getDuration());
        $this->em->persist($film);
        $this->em->flush();
    }


    public function deleteFilm($id){
        $film = $this->getFilm($id);
        $this->em->remove($film);
        $this->em->flush();
    }
    public function getFilms()
    {
        return $this->em->getRepository(Film:: class)
            ->findAll();
    }
    public function getFilm($id)
    {
        return $this->em->getRepository(Film:: class)
            ->find($id);
    }
}

?>
