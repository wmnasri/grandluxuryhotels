<?php
namespace Leave\Form;

use Zend\Form\Form;

class Entry extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->add(array(
            'name' => 'DateDebut',
            'type' => 'Zend\Form\Element\Date',
            'options' => array(
                'label' => 'Date de début',
                'format' => 'd/m/Y'
            ),
            'attributes' => array(
                'type' => 'text',
                'class'  => 'form-control',
                'required'
                
            ),
        ));

        $this->add(array(
            'name' => 'DateEnd',
            'options' => array(
                'label' => 'Date de fin',
            ),
            'attributes' => array(
                'type'   => 'text',
                'class'  => 'form-control',
                'required'
            ),
        ));

        $this->add(array(
            'name' => 'comment',
            'options' => array(
                'label' => 'Commentaire',
            ),
            'attributes' => array(
                'type' => 'textarea',
                'class'  => 'textarea form-control',
                'placeholder' => 'votre remarque'
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Envoyer',
                'class' => 'btn btn-primary'
            ),
        ));
    }
}
