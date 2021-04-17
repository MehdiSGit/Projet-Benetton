<?php

namespace App\Form;

use App\Entity\Recruteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Recruteur1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', null,[ 'label'=>'Email : '],[
                'label_attr' =>['class' => 'label_email']
                ])
            ->add('name', null, ["label"=>"Nom de l'entreprise : "],[
                'label_attr' =>['class' => 'label_name']
                ])
            ->add('description', null,["label"=>"Description : "],[
                'label_attr' =>['class' => 'label_description']
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recruteur::class,
        ]);
    }
}
