<?php

namespace App\Form;

use App\Entity\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccountFormPhpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('studenName', TextType::class, ['required'=>true])
            ->add('dateOfBirth', DateType::class, ['required'=>true,
                                                    'years'=>range(1990, 2023)])
            ->add('major', ChoiceType::class, ['choices'=>['SE - Computing'=>'SE - Computing',
                                                        'BA - Event'=>'BA - Event',
                                                        'BA - Business'=>'BA - Business',
                                                        'BA - Marketing'=>'BA - Marketing',
                                                        'GD - Graphic Design'=>'GD - Graphic Design',
                                                        'PDP - Student Service'=>'PDP - Student Service']])
            ->add('email', EmailType::class, ['required'=>true])
            ->add('gender', ChoiceType::class, ['choices'=>[
                                                'Male'=>true,
                                                'Female'=>false],
                                                'expanded'=>true ])

            ->add('password', PasswordType::class, ['required'=>true])
                                                    // RepeatedType::class, [
                                                    // 'type'=>PasswordType::class,
                                                    // 'first_option'=>['label'=>'Password'],
                                                    // 'second_option'=>['label'=>'Confirm Password']
                                                    // ])
            // ->add('rolesofGroup', ChoiceType::class, ['choices'=>['Leader'=>['ROLE_ADMIN'],
            //                                                 'Members'=>['ROLE_USER']]])

            ->add('studenId', TextType::class, ['required'=>true])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Account::class,
        ]);
    }


}
