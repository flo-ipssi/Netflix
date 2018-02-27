<?php
namespace AppBundle\Manager;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
class UserManager {
    /** @var EntityManagerInterface */
    private $em;
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }
    public function createUser(User $user)
    {
        $password = $this->passwordEncoder->encodePassword($user, $user->getPassword());
        $user
            ->setFirstname($user->getFirstname())
            ->setLastname( $user->getLastname())
            ->setEmail( $user->getEmail())
            ->setPassword( $password)
            ->setCreatAt( $user->getCreatAt())
            ->setMemberId( $user->getMemberId());
        $this->em->persist($user);
        $this->em->flush();
    }


    public function createadminUser($firstname, $lastname, $email, $password, $memberid)
    {

        $user = new User();
        $pass = $this->passwordEncoder->encodePassword($user, $password);
        $user
            ->setFirstname($firstname)
            ->setLastname( $lastname)
            ->setEmail($email)
            ->setPassword($pass)
            ->setCreatAt( $user->getCreatAt())
            ->setMemberId( $memberid);
        $this->em->persist($user);
        $this->em->flush();
    }


    public function deleteUser($id){
        $user = $this->getUser($id);
        $this->em->remove($user);
        $this->em->flush();
    }
    public function getUsers()
    {
        return $this->em->getRepository(User:: class)
            ->findAll();
    }
    public function getUser($id)
    {
        return $this->em->getRepository(User:: class)
            ->find($id);
    }
}

?>
