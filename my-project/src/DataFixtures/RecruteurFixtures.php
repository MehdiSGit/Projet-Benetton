<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Recruteur;

class RecruteurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $recruteur1 = new Recruteur;
        $recruteur1
                        ->setEmail('Orange@gmail.fr')
                        ->setPassword('123456')
                        ->setName('Orange')
                        ->setDescription('Téléphonie mobile');
        $manager->persist($recruteur1);

        $manager->flush();

        $recruteur2 = new Recruteur;
        $recruteur2
                        ->setEmail('Bleu@gmail.fr')
                        ->setPassword('123456')
                        ->setName('Bleu')
                        ->setDescription('Start-up');
        $manager->persist($recruteur2);

        $manager->flush();
    }
}
