<?php

namespace App\Form;

use App\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Job1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', null, [
                'attr' =>['class' =>''],
                'label_attr' =>['class' => 'label_code']
            ])
            ->add('name', null, [
                'attr' =>['class' =>''],
                'label_attr' =>['class' => 'label_name']
            ])
            ->add('description', null, [
                'attr' =>['class' =>''],
                'label_attr' =>['class' => 'label_description']
            ])
            ->add('jobStartDate', null, [
                'attr' =>['class' =>''],
                'label_attr' =>['class' => 'label_jobStartDate']
            ], DateType::class)
            ->add('city', null, [
                'attr' =>['class' =>''],
                'label_attr' =>['class' => 'label_city']
            ])
            ->add('TypeContrat', null, [
                'attr' =>['class' =>''],
                'label_attr' =>['class' => 'label_TypeContrat']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
