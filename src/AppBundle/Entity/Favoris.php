<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Favoris
 *
 * @ORM\Table(name="favoris")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FavorisRepository")
 */
class Favoris
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;
    /**
     * @var int
     *
     * @ORM\Column(name="id_work", type="integer")
     */
    private $idWork;
    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Favoris
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }
    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
    /**
     * Set idWork
     *
     * @param integer $idWork
     *
     * @return Favoris
     */
    public function setIdWork($idWork)
    {
        $this->idWork = $idWork;
        return $this;
    }
    /**
     * Get idWork
     *
     * @return int
     */
    public function getIdWork()
    {
        return $this->idWork;
    }
    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Favoris
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }
}