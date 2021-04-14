<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Candidat;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CandidatsFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $candidat1 = new Candidat();

        $password = $this->passwordEncoder->encodePassword(
            $candidat1,
            '123456'
        );
        
        $candidat1
                        ->setEmail('Rodica@gmail.fr')
                        ->setPassword($password)
                        ->setFirstName('Rodica')
                        ->setLastName('Equaly')
                        ->setRoles(['ROLE_CANDIDAT']);
        $manager->persist($candidat1);

        $manager->flush();

        $candidat2 = new Candidat();
        $candidat2
                        ->setEmail('Jacques@gmail.fr')
                        ->setPassword($password)
                        ->setFirstName('Jacques')
                        ->setLastName('Equaly')
                        ->setRoles(['ROLE_CANDIDAT']);
        $manager->persist($candidat2);

        $manager->flush();

        $candidat3 = new Candidat();
        $candidat3
                        ->setEmail('Mehdi@gmail.fr')
                        ->setPassword($password)
                        ->setFirstName('Mehdi')
                        ->setLastName('Equaly')
                        ->setRoles(['ROLE_CANDIDAT']);
        $manager->persist($candidat3);

        $manager->flush();
    }
}
