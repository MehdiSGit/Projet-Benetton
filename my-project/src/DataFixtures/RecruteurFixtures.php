<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Recruteur;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RecruteurFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $recruteur1 = new Recruteur;
        $password = $this->passwordEncoder->encodePassword(
            $recruteur1,
            '123456'
        );
        $recruteur1
                        ->setEmail('Orange@gmail.fr')
                        ->setPassword($password)
                        ->setName('Orange')
                        ->setDescription('Téléphonie mobile')
                        ->setRoles(['ROLE_RECRUTEUR']);
        $manager->persist($recruteur1);

        $manager->flush();

        $recruteur2 = new Recruteur;
        $recruteur2
                        ->setEmail('Bleu@gmail.fr')
                        ->setPassword($password)
                        ->setName('Bleu')
                        ->setDescription('Start-up')
                        ->setRoles(['ROLE_RECRUTEUR']);
        $manager->persist($recruteur2);

        $manager->flush();

        $recruteur3 = new Recruteur;
        $password = $this->passwordEncoder->encodePassword(
            $recruteur3,
            '123456'
        );
        $recruteur3
                        ->setEmail('Rosé@gmail.fr')
                        ->setPassword($password)
                        ->setName('Rosé')
                        ->setDescription('Jacques&Co')
                        ->setRoles(['ROLE_RECRUTEUR']);
        $manager->persist($recruteur3);

        $manager->flush();

        $recruteur4 = new Recruteur;
        $password = $this->passwordEncoder->encodePassword(
            $recruteur4,
            '123456'
        );
        $recruteur4
                        ->setEmail('Black@gmail.fr')
                        ->setPassword($password)
                        ->setName('Black')
                        ->setDescription('RodicaForEver')
                        ->setRoles(['ROLE_RECRUTEUR']);
        $manager->persist($recruteur4);

        $manager->flush();
    }
}
