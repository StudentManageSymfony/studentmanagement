<?php

namespace App\Form;

use App\Entity\Clubs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('clubId', TextType::class, ['required'=>true])
            ->add('clubName', TextType::class, ['required'=>true])
            ->add('numberOfMembers', TextType::class, ['required'=>true])
            ->add('leaderName', TextType::class, ['required'=>true])
            ->add('description', TextType::class, ['required'=>true])
            ->add('file', FileType::class, [
                                            'required'=>false,
                                            'mapped'=>false
                                            ])
            ->add('image', HiddenType::class, ['required'=>false])
            
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clubs::class,
        ]);
    }
}
