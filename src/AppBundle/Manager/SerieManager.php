<?php
namespace AppBundle\Manager;
use AppBundle\Entity\Series;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
class SerieManager {
    /** @var EntityManagerInterface */
    private $em;
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }
    public function addSerie(Series $serie)
    {
        $serie
            ->setTitle($serie->getTitle())
            ->setAuthor( $serie->getAuthor())
            ->setDate( $serie->getDate())
            ->setCategory( $serie->getCategory())
            ->setDescription( $serie->getDescription())
            ->setBrochure( $serie->getBrochure())
            ->setVideo( $serie->getVideo())
            ->setDuration( $serie->getDuration());
        $this->em->persist($serie);
        $this->em->flush();
    }
    public function deleteSerie($id){
        $serie = $this->getSerie($id);
        $this->em->remove($serie);
        $this->em->flush();
    }
    public function getSeries()
    {
        return $this->em->getRepository(Series:: class)
            ->findAll();
    }
    public function getSerie($id)
    {
        return $this->em->getRepository(Series:: class)
            ->find($id);
    }
}

?>