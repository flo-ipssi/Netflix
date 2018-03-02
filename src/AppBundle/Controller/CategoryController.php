<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Films;
use AppBundle\Entity\Series;
use AppBundle\Manager\FilmManager;
use AppBundle\Manager\CategoryManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\SecurityBundle\Tests\Functional\Bundle\CsrfFormLoginBundle\Form\UserLoginType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
class CategoryController extends Controller
{
    /** @var EntityManagerInterface */
    private $em;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }
    /**
     * @Route("/category", name="category")
     */
    public function categoryAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/securitytest.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/category/{cat}", name="category-view-txt")
     */
    public function viewMoviesCategory(string $cat, CategoryManager $categoryManager,FilmManager $films)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository(Category::class)->findAll();
        $id = $categoryManager->getIdCategory($cat);
        if (empty($id))
        {
            $films = $em->getRepository(Films::class)->findAll();
            $category = $em->getRepository(Category::class)->findAll();
            return $this->render('media/films.html.twig',[
                'films' => $films,
                'categories' => $category
            ]);
        }else{
            $films = $em->getRepository(Films:: class)
                ->findBy(
                    array('category' => $id));
            return $this->render('media/films.html.twig', [
                'films' => $films,
                'categories' => $category
            ]);
        }
    }
    /**
     * @Route("/series/{cat}", name="category-view")
     */
    public function viewSeriesCategory(string $cat, CategoryManager $categoryManager,FilmManager $series)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository(Category::class)->findAll();
        $id = $categoryManager->getIdCategory($cat);
        if (empty($id))
        {
            $series = $em->getRepository(Series::class)->findAll();
            $category = $em->getRepository(Category::class)->findAll();
            return $this->render('media/series.html.twig',[
                'series' => $series,
                'categories' => $category
            ]);
        }else{
            $series = $em->getRepository(Series:: class)
                ->findBy(
                    array('category' => $id));
            return $this->render('media/series.html.twig', [
                'series' => $series,
                'categories' => $category
            ]);
        }
    }
}
?>