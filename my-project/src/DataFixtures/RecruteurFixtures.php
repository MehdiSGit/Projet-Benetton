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
                        ->setDescription('Téléphonie mobile');
        $manager->persist($recruteur1);

        $manager->flush();

        $recruteur2 = new Recruteur;
        $recruteur2
                        ->setEmail('Bleu@gmail.fr')
                        ->setPassword($password)
                        ->setName('Bleu')
                        ->setDescription('Start-up');
        $manager->persist($recruteur2);

        $manager->flush();
    }
}
