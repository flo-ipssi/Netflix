<?php
namespace AppBundle\Manager;
use AppBundle\Entity\Category;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
class CategoryManager {
    /** @var EntityManagerInterface */
    private $em;
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }
    public function addCategory(Category $category)
    {
        $category
            ->setGenre( $category->getDuration());
        $this->em->persist($category);
        $this->em->flush();
    }
    public function deleteCategory($id){
        $category = $this->getCategory($id);
        $this->em->remove($category);
        $this->em->flush();
    }
    public function getCategories()
    {
        return $this->em->getRepository(Category:: class)
            ->findAll();
    }
    public function getCategory($id)
    {
        return $this->em->getRepository(Category:: class)
            ->find($id);
    }
    /**
     * @param $str
     * @return array
     */
    public function getIdCategory($str)
    {
        $arr = $this->em->getRepository(Category:: class)
            ->findBy(
                array('genre' => $str)
            );
        foreach ($arr as $value) {
            $id = $value;
        }
        return $id;
    }
}
?>