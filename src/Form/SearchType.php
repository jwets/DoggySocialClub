<?php

namespace App\Form;


use App\Entity\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('submit', SubmitType::class, array(
                'label' => 'Recherche',
            ))
            ->add('reinitialiser', SubmitType::class, array(
                'label' => 'Réinitialiser',
            ))
            ->add('homeDetails', ChoiceType::class, [
                'label' => 'Dans ma maison, il y a',
                'choices'  => [
                    'Des enfants (0 - 12 ans)' => 'Des enfants (0 - 12 ans)',
                    'Un jardin' => 'Un jardin',
                    'Un ou plusieurs chats' => 'Un ou plusieurs chats',
                    "D'autres animaux" => "D'autres animaux",
                ],
                'expanded' => true,
                'multiple' => true,
                'required' => false
            ])
            ->add('duringWork', ChoiceType::class, [
                'label' => 'Les jours où je travaille, mon/mes chien(s)',
                'placeholder' => 'Non',
                'choices'  => [
                    'Restent seuls à la maison' => 'Restent seuls à la maison',
                    "Restent à la maison avec quelqu'un" => "Restent à la maison avec quelqu'un",
                    'Vont à une garderie' => 'Vont à une garderie',
                    'Vont avec moi au bureau' => 'Vont avec moi au bureau',
                    'Font une promenade pendant la journée' => 'Font une promenade pendant la journée',
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('homeType', ChoiceType::class, [
                'label' =>  "J'habite dans",
                'placeholder' => 'Non',
                'choices'  => [
                    'Une maison' => 'Une maison',
                    'Un appartement' => 'Un appartement',
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
