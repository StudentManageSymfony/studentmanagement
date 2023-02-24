<?php

namespace App\Form;

use App\Entity\Clubs;
use App\Entity\Member;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->setMethod("GET")
            ->add('memberRole', ChoiceType::class, [
                                                    'choices'=>[
                                                                'Leader'=>'0',
                                                                'Vice Leader'=>'1',
                                                                'Cashier'=>'2',
                                                                'Member'=>'3'
                                                    ],
            ])
            ->add('file', FileType::class, [
                                            'required'=> false,
                                            'mapped'=> false
            ])
            ->add('image', HiddenType::class, ['required'=> false])
            ->add('accid', HiddenType::class,[
                'mapped'=>false
            ])
            ->add('clubId', EntityType::class, ['class'=>Clubs::class, 
            'choice_label'=>'clubName'])
            // ->add('clubId', TextType::class)
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
        ]);
    }
}
