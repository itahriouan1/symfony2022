<?php

namespace App\Form;

use App\Entity\Stage;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sujet')
            ->add('entreprise')
            ->add('dateDebut',DateTimeType::class,['widget' => 'single_text'])
            ->add('dateFin')
            ->add('description')
            ->add('ok',SubmitType::class, ['attr'=> ['class'=>'btn btn-success', 'value' =>'enregistrer']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}
