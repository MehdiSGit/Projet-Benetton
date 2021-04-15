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

                // for($i = 0; $i < 6; $i++){

                $annonce1 = new Job();
                $annonce1
                        ->setName('Developpeur Web Senior')
                        ->setDescription('Donec vehicula elementum ante tempor consequat. Duis condimentum ac lacus at auctor. Quisque id metus nec mauris dictum pretium. Phasellus non augue tristique, euismod mauris ut, condimentum eros. Vestibulum augue risus, dictum ut lobortis interdum, pulvinar id erat. Phasellus urna eros, semper quis leo vitae, pulvinar condimentum magna. Morbi condimentum at ex sed efficitur. Fusce a mauris vel lacus varius blandit. Proin eu metus lobortis felis pretium rutrum quis eu dui. Curabitur et enim id nisl facilisis interdum. Quisque aliquam eleifend dignissim. Etiam sagittis varius elit eu tincidunt. Aenean porttitor efficitur dapibus. ')
                        ->setCode('Developper Web')
                        ->setCity('Paris')
                        ->setTypeContrat('CDI');

                $manager->persist($annonce1);

                $manager->flush();

                $annonce2 = new Job();
                $annonce2
                        ->setName('Developpeur Web Junior')
                        ->setDescription('Mauris mattis at nisi sit amet condimentum. Phasellus ut luctus urna, non lacinia purus. Mauris ac ex in odio efficitur tempus. Mauris at magna non tellus blandit consequat. Donec lorem eros, blandit in nulla eget, dignissim eleifend nisl. Suspendisse pharetra ultrices mi, ornare rhoncus nisl vestibulum eu. Morbi dignissim nisl sit amet pulvinar pharetra. Pellentesque aliquam, nulla ac consectetur condimentum, purus turpis pretium magna, ac tincidunt augue urna et eros. Curabitur in vulputate risus. Quisque massa lectus, congue ac justo id, blandit auctor felis. ')
                        ->setCode('Developper Web')
                        ->setCity('Paris')
                        ->setTypeContrat('CDI');

                $manager->persist($annonce2);

                $manager->flush();

                $annonce3 = new Job();
                $annonce3
                        ->setName('UX Designer Senior')
                        ->setDescription('Praesent sollicitudin luctus ultricies. Aenean consequat tortor eget diam cursus congue. Nullam ullamcorper dictum vulputate. Nulla non nulla et urna rhoncus eleifend vel eget mi. Fusce arcu felis, sagittis et ornare in, luctus ac eros. Nunc mollis dui at nulla scelerisque, vel maximus est posuere. Ut non placerat elit. In malesuada fringilla pretium. Suspendisse enim lectus, molestie ac odio fringilla, euismod venenatis est. Vestibulum pharetra at dolor varius ultrices. Fusce at hendrerit metus. Suspendisse quis massa ac eros semper sodales. Duis efficitur, nulla nec hendrerit dictum, risus dolor mattis velit, quis suscipit arcu nulla vitae leo.')
                        ->setCode('UX Design')
                        ->setCity('Paris')
                        ->setTypeContrat('CDI');

                $manager->persist($annonce3);

                $manager->flush();

                $annonce4 = new Job();
                $annonce4
                        ->setName('UX Designer Junior')
                        ->setDescription('Vivamus aliquet hendrerit erat. Pellentesque tristique diam accumsan pulvinar finibus. Donec tincidunt massa nisl. Aenean purus eros, gravida eget congue eu, ultrices eu enim. Nulla sodales mattis libero, ut aliquam purus dignissim sit amet. Nam odio enim, aliquet sit amet interdum quis, blandit vel quam. Aenean consectetur rhoncus pharetra. Cras aliquet cursus sapien eu accumsan. Aenean porttitor orci tortor, sit amet facilisis sem euismod quis. Aenean auctor eros enim, in vehicula dolor commodo vitae. ')
                        ->setCode('UX Design')
                        ->setCity('Paris')
                        ->setTypeContrat('CDI');

                $manager->persist($annonce4);

                $manager->flush();

                $annonce5 = new Job();
                $annonce5
                        ->setName('Ui Designer Junior')
                        ->setDescription('Donec vehicula elementum ante tempor consequat. Duis condimentum ac lacus at auctor. Quisque id metus nec mauris dictum pretium. Phasellus non augue tristique, euismod mauris ut, condimentum eros. Vestibulum augue risus, dictum ut lobortis interdum, pulvinar id erat. Phasellus urna eros, semper quis leo vitae, pulvinar condimentum magna. Morbi condimentum at ex sed efficitur. Fusce a mauris vel lacus varius blandit. Proin eu metus lobortis felis pretium rutrum quis eu dui. Curabitur et enim id nisl facilisis interdum. Quisque aliquam eleifend dignissim. Etiam sagittis varius elit eu tincidunt. Aenean porttitor efficitur dapibus.  ')
                        ->setCode('Ui Design')
                        ->setCity('Paris')
                        ->setTypeContrat('CDI');

                $manager->persist($annonce5);

                $manager->flush();

                $annonce6 = new Job();
                $annonce6
                        ->setName('Ui Designer Senior')
                        ->setDescription('Mauris mattis at nisi sit amet condimentum. Phasellus ut luctus urna, non lacinia purus. Mauris ac ex in odio efficitur tempus. Mauris at magna non tellus blandit consequat. Donec lorem eros, blandit in nulla eget, dignissim eleifend nisl. Suspendisse pharetra ultrices mi, ornare rhoncus nisl vestibulum eu. Morbi dignissim nisl sit amet pulvinar pharetra. Pellentesque aliquam, nulla ac consectetur condimentum, purus turpis pretium magna, ac tincidunt augue urna et eros. Curabitur in vulputate risus. Quisque massa lectus, congue ac justo id, blandit auctor felis.   ')
                        ->setCode('Ui Design')
                        ->setCity('Paris')
                        ->setTypeContrat('CDI');

                $manager->persist($annonce6);

                $manager->flush();

                $annonce7 = new Job();
                $annonce7
                        ->setName('Data Analyst junior')
                        ->setDescription('Mauris mattis at nisi sit amet condimentum. Phasellus ut luctus urna, non lacinia purus. Mauris ac ex in odio efficitur tempus. Mauris at magna non tellus blandit consequat. Donec lorem eros, blandit in nulla eget, dignissim eleifend nisl. Suspendisse pharetra ultrices mi, ornare rhoncus nisl vestibulum eu. Morbi dignissim nisl sit amet pulvinar pharetra. Pellentesque aliquam, nulla ac consectetur condimentum, purus turpis pretium magna, ac tincidunt augue urna et eros. Curabitur in vulputate risus. Quisque massa lectus, congue ac justo id, blandit auctor felis.   ')
                        ->setCode('Data Analyst')
                        ->setCity('Paris')
                        ->setTypeContrat('CDI');

                $manager->persist($annonce7);

                $manager->flush();

                $annonce8 = new Job();
                $annonce8
                        ->setName('Data Analyst senior')
                        ->setDescription('Mauris mattis at nisi sit amet condimentum. Phasellus ut luctus urna, non lacinia purus. Mauris ac ex in odio efficitur tempus. Mauris at magna non tellus blandit consequat. Donec lorem eros, blandit in nulla eget, dignissim eleifend nisl. Suspendisse pharetra ultrices mi, ornare rhoncus nisl vestibulum eu. Morbi dignissim nisl sit amet pulvinar pharetra. Pellentesque aliquam, nulla ac consectetur condimentum, purus turpis pretium magna, ac tincidunt augue urna et eros. Curabitur in vulputate risus. Quisque massa lectus, congue ac justo id, blandit auctor felis.   ')
                        ->setCode('Data Analyst')
                        ->setCity('Paris')
                        ->setTypeContrat('CDD');

                $manager->persist($annonce8);

                $manager->flush();

                $this->setReference('annonce1',$annonce1);
                $this->setReference('annonce2',$annonce2);
                $this->setReference('annonce3',$annonce3);
                $this->setReference('annonce4',$annonce4);
                $this->setReference('annonce5',$annonce5);
                $this->setReference('annonce6',$annonce6);
                $this->setReference('annonce7',$annonce7);
                $this->setReference('annonce8',$annonce8);
        }
}
