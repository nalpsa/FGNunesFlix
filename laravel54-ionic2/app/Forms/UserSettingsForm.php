<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 29/07/2017
 * Time: 20:37
 */

namespace FGNunesFlix\Forms;

use Kris\LaravelFormBuilder\Form;

class UserSettingsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('password', 'password', [
                'rules' => 'required|min:6|max:16|confirmed'
            ])
            ->add('password_confirmation', 'password');
    }
}
