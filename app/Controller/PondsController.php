<?php

class PondsController extends AppController
{
    public function beforeFilter()
    {
        $this->viewClass = 'Json';
        parent::beforeFilter();
    }

    public function all()
    {
        $fishTypes = $this->Pond->find('all', array(
            'order' => array('code')
        ));
        $this->set(array(
            'fishTypes' => $fishTypes, '_serialize' => 'fishTypes'
        ));
    }
}