<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Candidat;

class CandidatsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $candidat1 = new Candidat();
        $candidat1
                        ->setEmail('Rodica@gmail.fr')
                        ->setPassword('123456')
                        ->setFirstName('Rodica')
                        ->setLastName('Equaly');
        $manager->persist($candidat1);

        $manager->flush();

        $candidat2 = new Candidat();
        $candidat2
                        ->setEmail('Jacques@gmail.fr')
                        ->setPassword('123456')
                        ->setFirstName('Jacques')
                        ->setLastName('Equaly');
        $manager->persist($candidat2);

        $manager->flush();

        $candidat3 = new Candidat();
        $candidat3
                        ->setEmail('Mehdi@gmail.fr')
                        ->setPassword('123456')
                        ->setFirstName('Mehdi')
                        ->setLastName('Equaly');
        $manager->persist($candidat3);

        $manager->flush();
    }
}
