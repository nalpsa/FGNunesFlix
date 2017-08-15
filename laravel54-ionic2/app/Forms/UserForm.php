<?php

namespace FGNunesFlix\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');
        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|max:150'
            ])
            ->add('email', 'email', [
                'label' => 'E-mail',
                'rules' => "required|max:150|unique:users,email,$id"
            ]);
    }
}
