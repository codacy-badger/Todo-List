<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('username', TextType::class,[
                'label'=> "Nom d'utilisateur",
                'attr'=> [
                    'placeholder'=> "Saisir un nom d'utilisateur valide..."
                ]
            ])
            ->add('email', EmailType::class, [
                'label'=>"Adresse email",
                'attr'=> [
                    'placeholder'=>"Saisir une adresse amil valide..."
                ]
            ])

            ->add('role', ChoiceType::class, [
                'label' => "Droits utilisateur",
                'choices'=>[
                    'Choisir un rôle...'=>'',
                    'Utilisateur'=> "ROLE_USER",
                    'Administrateur'=>"ROLE_ADMIN"
                ]
            ])

            ->add('password', PasswordType::class,[
                'label'=> "Mot de passe",
                'attr'=> [
                    'placeholder'=> "Saisir un mot de passe d'au moins 6 caractères..."
                ]
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
