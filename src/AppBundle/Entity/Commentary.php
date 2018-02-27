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
     * @var int
     *
     * @ORM\Column(name="icon", type="integer")
     */
    private $icon;
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
     * @return Commentary
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
     * Set icon
     *
     * @param integer $icon
     *
     * @return Commentary
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }
    /**
     * Get icon
     *
     * @return int
     */
    public function getIcon()
    {
        return $this->icon;
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
    public function setCreatAd($creatAd)
    {
        $this->creatAd = $creatAd;
        return $this;
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