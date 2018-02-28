<?php
namespace AppBundle\Manager;
use AppBundle\Entity\Films;
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
    public function addFilm(Films $film)
    {
        $film
            ->setTitle($film->getTitle())
            ->setAuthor( $film->getAuthor())
            ->setDate( $film->getDate())
            ->setCategory( $film->getCategory())
            ->setDescription( $film->getDescription())
            ->setBrochure( $film->getBrochure())
            ->setVideo( $film->getVideo())
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
        return $this->em->getRepository(Films:: class)
            ->findAll();
    }
    public function getFilm($id)
    {
        return $this->em->getRepository(Films:: class)
            ->find($id);
    }
}
?>