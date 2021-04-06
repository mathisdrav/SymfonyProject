<?php

namespace App\Form;

use App\Entity\Voitures;
use Doctrine\DBAL\Types\TextType as TypesTextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('createdAt')
            //->add('updatedAt')
            ->add('modele', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('marque', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('puissance', IntegerType::class, [
                "attr" => [
                    "class" => "form-control",
                    "min" => 0
                ]
            ])
            ->add('annee', IntegerType::class, [
                "attr" => [
                    "class" => "form-control",
                    "min" => 1900,
                    "max" => date('Y'),
                    "step" => 1
                ]
            ])
            ->add('finition', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('description', TextareaType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('uploadImage', FileType::class, [
                "mapped" => false,                      //permet d'être ignoré lors de la lecture ou de l'écriture de l'objet
                "attr" => [
                    "class" => "form-control",
                    "accept" => "image/*"
                ]
                
            ])
            ->add('prix', IntegerType::class, [
                "attr" => [
                    "class" => "form-control",
                    "min" => 0,
                    "step" => 0.01
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voitures::class,
        ]);
    }
}
