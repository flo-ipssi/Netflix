<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Documentary
 *
 * @ORM\Table(name="documentary")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DocumentaryRepository")
 */
class Documentary
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
     * @ORM\Column(name="category", type="integer", length=11)
     */
    private $category;
    /**
     * @var int
     *
     * @ORM\Column(name="description", type="integer")
     */
    private $description;
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
     * Set title
     *
     * @param string $title
     *
     * @return Documentary
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
     * @return Documentary
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
     * @param int $category
     *
     * @return Documentary
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
    /**
     * Get category
     *
     * @return int
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
     * @return Documentary
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
}