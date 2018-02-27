<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 26/02/2018
 * Time: 11:12
 */
namespace AppBundle\Command;
use AppBundle\Manager\UserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class CreateUserCommand extends Command
{
    /** @var UserManager */
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
        parent::__construct();
    }
    protected function configure()
    {
        $this
            ->setName('app:create:user')
            ->setDescription('Ajouter un utilisateur')
            ->setHelp('Commande permettant d\'ajouter un utilisateur avec tputes ses informations ')
            ->addArgument('firstname', InputArgument::REQUIRED,"User firstname" )
            ->addArgument('lastname', InputArgument::REQUIRED,"User lastname" )
            ->addArgument('email', InputArgument::REQUIRED,"User email" )
            ->addArgument('password', InputArgument::REQUIRED,"User password" )
            ->addArgument('member_id', InputArgument::REQUIRED,"User type" );
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(['
        Ajout d\'utilisateur',
            '================'
        ]);
        $output->writeln('Firstname: '.$input->getArgument('firstname'));
        $output->writeln('Lastname: '.$input->getArgument('lastname'));
        $output->writeln('Email: '.$input->getArgument('email'));
        $output->writeln('Password: '.$input->getArgument('password'));
        $output->writeln('Membre: '.$input->getArgument('member_id'));
        $this->userManager->createadminUser($input->getArgument('firstname'),
            $input->getArgument('lastname'),
            $input->getArgument('email'),
            $input->getArgument('password'),
            $input->getArgument('member_id'));
        $output->writeln('Firstname: '.$input->getArgument('firstname'));
        $output->writeln('Lastname: '.$input->getArgument('lastname'));
        $output->writeln('Email: '.$input->getArgument('email'));
        $type = $input->getArgument('member_id');
        switch ($type)
        {
            case 1:
                $output->writeln('Member: User');
                break;
            case 2:
                $output->writeln('Member: User Premium');
                break;
            case 3:
                $output->writeln('Member: Admin');
                break;
        }
        $output->writeln('User successfully created!');
    }
}