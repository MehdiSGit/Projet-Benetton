<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Job;
use Symfony\Component\Validator\Constraints\Date;

class JobFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $annonce1 = new Job();
        $annonce1
                ->setName('Developpeur Web Senior')
                ->setDescription('CDI pour faire du code ')
                ->setCode('Jacques');
                
                

                
        $manager->persist($annonce1);

        $manager->flush();

        $annonce2 = new Job();
        $annonce2
                ->setName('Developpeur Web Junior')
                ->setDescription('CDI pour faire du code ')
                ->setCode('Jacques');
                
                

                
        $manager->persist($annonce2);

        $manager->flush();
    }
}
