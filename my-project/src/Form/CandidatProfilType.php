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
            ->add('firstName', null,[ 'label'=>'Prénom'])
            // ->add('firstName', null,[
            //     'attr'=>[ 'class'=>'input']
            // ])
            ->add('lastName', null,[ 'label'=>'Nom']
            )
            ->add('education', null, [
                'attr' =>['class' =>''],
                'label_attr' =>['class' => 'label_candidat']
            ])
            ->add('experience', null, [
                'label_attr' =>['class' => 'label_experience']
            ])

            ->add('descriptionCandidat', null, ['label'=>'Ma description'])
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
