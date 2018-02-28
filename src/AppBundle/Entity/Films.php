<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Films
 *
 * @ORM\Table(name="films")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilmsRepository")
 */
class Films
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;
    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Films
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Set author
     *
     * @param string $author
     *
     * @return Films
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }
    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * Set category
     *
     * @param string $category
     *
     * @return Films
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Set description
     *
     * @param string $description
     *
     * @return Films
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Films
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set duration
     *
     * @return Films
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }
    /**
     * Get duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }


    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a image file.")
     * @Assert\File(mimeTypes={ "image/jpeg", "video/mp4"})
     */
    private $brochure;

    public function getBrochure()
    {
        return $this->brochure;
    }

    public function setBrochure($brochure)
    {
        $this->brochure = $brochure;

        return $this;
    }


    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a video file.")
     * @Assert\File(mimeTypes={ "video/mp4", "video/quicktime"})
     */
    private $video;

    public function getVideo()
    {
        return $this->video;
    }

    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }
}