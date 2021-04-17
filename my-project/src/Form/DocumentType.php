<?php

namespace App\Form;

use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('name')
            // ->add('urlProfil')
            ->add(
                'pieceJointeFile', VichImageType::class, [
                'required' => false,
                'download_label' => "Télécharger l'image",
                'download_uri' => true,
                'image_uri' => true,
                'asset_helper' => true,
            ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
