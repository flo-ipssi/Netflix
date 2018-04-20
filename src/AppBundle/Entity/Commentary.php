<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Commentary
 *
 * @ORM\Table(name="commentary")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentaryRepository")
 */
class Commentary
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
     * @var string
     *
     * @ORM\Column(name="user", type="string")
     */
    private $user;
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
     * @var string
     *
     * @ORM\Column(name="commentary", type="text", nullable=true)
     */
    private $commentary;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creatAd", type="datetime")
     */
    private $creatAd;



    public function __construct()
    {
        $this->creatAd = new \Datetime();
    }


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
     * Set User
     *
     * @param string $User
     *
     * @return Commentary
     */
    public function setUser($User)
    {
        $this->User = $User;
        return $this;
    }
    /**
     * Get User
     *
     * @return string
     */
    public function getUser()
    {
        return $this->User;
    }
    /**
     * Set idWork
     *
     * @param integer $idWork
     *
     * @return Commentary
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
     * @return Commentary
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
    /**
     * Set commentary
     *
     * @param string $commentary
     *
     * @return Commentary
     */
    public function setCommentary($commentary)
    {
        $this->commentary = $commentary;
        return $this;
    }
    /**
     * Get commentary
     *
     * @return string
     */
    public function getCommentary()
    {
        return $this->commentary;
    }
    /**
     * Set creatAd
     *
     * @param \DateTime $creatAd
     *
     * @return Commentary
     */
    public function setCreatAd()
    {
        return $this->creatAd;
    }
    /**
     * Get creatAd
     *
     * @return \DateTime
     */
    public function getCreatAd()
    {
        return $this->creatAd;
    }
}