<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            // ->add('firstName', null,[
            //     'attr'=>[ 'class'=>'input']
            // ])
            ->add('lastName')
            ->add('createAt')
            ->add('education')
            ->add('experience')
            ->add('descriptionCandidat')
            ->add('documents', CollectionType::class, [
                'entry_type' => DocumentType::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
