<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Saison
 *
 * @ORM\Table(name="saison")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SaisonRepository")
 */
class Saison
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
     * @ORM\Column(name="number_saison", type="integer")
     */
    private $numberSaison;
    /**
     * @var int
     *
     * @ORM\Column(name="episode", type="integer")
     */
    private $episode;
    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;
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
     * Set numberSaison
     *
     * @param integer $numberSaison
     *
     * @return Saison
     */
    public function setNumberSaison($numberSaison)
    {
        $this->numberSaison = $numberSaison;
        return $this;
    }
    /**
     * Get numberSaison
     *
     * @return int
     */
    public function getNumberSaison()
    {
        return $this->numberSaison;
    }
    /**
     * Set episode
     *
     * @param integer $episode
     *
     * @return Saison
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;
        return $this;
    }
    /**
     * Get episode
     *
     * @return int
     */
    public function getEpisode()
    {
        return $this->episode;
    }
    /**
     * Set link
     *
     * @param string $link
     *
     * @return Saison
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }
    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }
}