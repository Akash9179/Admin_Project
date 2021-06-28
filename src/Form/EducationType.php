<?php

namespace App\Form;

use App\Entity\Education;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                "label"=>"School Name"
            ])
            ->add('location',TextType::class,[
                "label"=>"School Location?"
            ])
            ->add('type',ChoiceType::class,[
                'label'=>'Type of Education?',
                'choices' => [
                    'College' => "College",
                    'University' => "University",
                    'Technical Trade' => "Technical Trade",

                ]
    ])
            ->add('year',TextType::class,[
                "label"=>"School Year"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Education::class,
        ]);
    }
}
