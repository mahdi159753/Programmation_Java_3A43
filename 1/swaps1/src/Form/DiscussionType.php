<?php

namespace App\Form;

use App\Entity\Discussion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Eckinox\TinymceBundle\Form\Type\TinymceType;


class DiscussionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreDiscussion', TextType::class, [
                'label' => 'Titre de la discussion',
                
            ])
            ->add('contenuDiscussion', TinymceType::class, [
                'attr' => [
                    'toolbar' => 'bold italic underline | bullist numlist emoticons', // Ajouter le plugin 'emoticons' à la barre d'outils
                    'plugins' => 'emoticons', // Activer le plugin 'emoticons'
                    'emoticons_data' => '[{"shortcut": ":)", "url": "https://example.com/emoji/smile.png"}, {"shortcut": ":(", "url": "https://example.com/emoji/sad.png"}]' ,// Définir la liste des emojis disponibles
                    'label' => 'Contenu de la discussion'
                ],
            ])
            
            ->add('imageDiscussion', FileType::class, [
                'label' => 'Image de la discussion',
                'required' => false,
                'data_class' => null,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Discussion::class,
        ]);
    }
}
