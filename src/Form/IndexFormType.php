<?php
    namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

    class IndexFormType extends AbstractType{
        public function buildIndexForm(FormBuilderInterface $builder, array $options)
        {
            $builder
            ->add('username', TextType::class, ['required'=>true])
            ->add('password', PasswordType::class, ['required'=>true])
            ->add('login', SubmitType::class)
            ;
        }
    }
?>