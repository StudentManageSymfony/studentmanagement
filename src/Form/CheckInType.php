<?php

namespace App\Form;

use App\Entity\Activities;
use App\Entity\CheckIn;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CheckInType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('activities', EntityType::class, ['class'=>Activities::class, 
            'choice_label'=>'Name'])

            // ->add('account', )
            ->add('submit', SubmitType::class)
            // ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CheckIn::class,
        ]);
    }
}
