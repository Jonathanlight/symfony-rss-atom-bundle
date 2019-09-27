<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RssType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', UrlType::class, [
                'label' => 'URL RSS',
                'required' => true,
                'attr' => [
                    'class' => 'input-field col s12',
                    'placeholder' => 'https://'
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Search',
                'attr' => [
                    'class' => 'btn col orange s6',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
