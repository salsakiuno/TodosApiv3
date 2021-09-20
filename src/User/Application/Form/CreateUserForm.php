<?php

namespace App\User\Application\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class CreateUserForm extends AbstractType
{
    private const MSG_EMAIL = 'INVALID_EMAIL';
    private const MSG_USER_NAME = 'INVALID_EMAIL';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => true,
                'constraints' => array(
                    new NotBlank()
                ),
                'invalid_message' => self::MSG_EMAIL
            ])
            ->add('userName', TextType::class, [
                'required' => true,
                'constraints' => array(
                    new NotBlank()
                ),
                'invalid_message' => self::MSG_USER_NAME
            ]);             
    }

}
