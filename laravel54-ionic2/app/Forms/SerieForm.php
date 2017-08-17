<?php

namespace FGNunesFlix\Forms;

use Kris\LaravelFormBuilder\Form;

class SerieForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'label' => 'Titulo',
                'rules' => 'required|max:255'
            ])
            ->add('description', 'textarea', [
                'label' => 'Descrição',
                'rules' => 'required|max:255'
            ])
            ->add('thumb_file', 'file', [
                'label' => 'Imagem',
                'rules' => 'required|image|max:1024'
            ]);
    }
}
