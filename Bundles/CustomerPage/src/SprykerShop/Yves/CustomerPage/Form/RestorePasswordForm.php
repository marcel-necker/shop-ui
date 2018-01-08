<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\CustomerPage\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RestorePasswordForm extends AbstractType
{
    const FIELD_RESTORE_PASSWORD_KEY = 'restore_password_key';
    const FIELD_PASSWORD = 'password';

    /**
     * @return string
     */
    public function getName()
    {
        return 'restoreForm';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this
            ->addRestorePasswordKeyField($builder)
            ->addPasswordField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addRestorePasswordKeyField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_RESTORE_PASSWORD_KEY, 'hidden');

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addPasswordField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_PASSWORD, 'repeated', [
            'first_name' => 'pass',
            'second_name' => 'confirm',
            'type' => 'password',
            'invalid_message' => 'validator.constraints.password.do_not_match',
            'required' => true,
            'first_options' => [
                'label' => 'forms.password',
            ],
            'second_options' => [
                'label' => 'forms.confirm-password',
            ],
        ]);

        return $this;
    }
}
