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
        $annonce1 = $this->getReference('annonce1');
        $annonce2 = $this->getReference('annonce2');
        $annonce3 = $this->getReference('annonce3');
        $annonce4 = $this->getReference('annonce4');
        $annonce5 = $this->getReference('annonce5');
        $annonce6 = $this->getReference('annonce6');
        $annonce7 = $this->getReference('annonce7');
        $annonce8 = $this->getReference('annonce8');

        

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
                        ->setRoles(['ROLE_RECRUTEUR'])
                        ->addJob($annonce1)
                        ->addJob($annonce2);
        $manager->persist($recruteur1);

        $manager->flush();

        $recruteur2 = new Recruteur;
        $recruteur2
                        ->setEmail('Bleu@gmail.fr')
                        ->setPassword($password)
                        ->setName('Bleu')
                        ->setDescription('Start-up')
                        ->setRoles(['ROLE_RECRUTEUR'])
                        ->addJob($annonce3)
                        ->addJob($annonce4);
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
                        ->setRoles(['ROLE_RECRUTEUR'])
                        ->addJob($annonce5)
                        ->addJob($annonce6);
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
                        ->setRoles(['ROLE_RECRUTEUR'])
                        ->addJob($annonce7)
                        ->addJob($annonce8);
        $manager->persist($recruteur4);

        $manager->flush();
    }
}
