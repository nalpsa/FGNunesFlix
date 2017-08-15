<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 29/07/2017
 * Time: 20:02
 */

namespace FGNunesFlix\Forms;

use Kris\LaravelFormBuilder\Form;

class CategoryForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'rules' => 'required'
            ]);
    }
}