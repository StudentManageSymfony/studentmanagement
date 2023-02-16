<?php
    namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;

    class ActivitiesFormType extends AbstractType{
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
            ->add('Name', TextType::class, ['required'=>true])
            ->add('Score', TextType::class, ['required'=>true])
            ->add('Image', HiddenType::class, ['required'=>false])
            ->add('StartDate', DateType::class, ['required'=>true])
            ->add('StartTime', TimeType::class, ['required'=>true])
            ->add('EndTime', TimeType::class, ['required'=>true])
            ->add('Organizer', ChoiceType::class, ['required'=>true,
                                                    'choices'=>[
                                                        'English Speaking'=>'English Speaking',
                                                        'Book'=>'Book'

            ]])
            ->add('Submit', SubmitType::class)

            ;
        }
    }
?>