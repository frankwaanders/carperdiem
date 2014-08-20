<?php

class FishTypesController extends AppController {
    public function beforeFilter()
    {
        $this->viewClass = 'Json';
        parent::beforeFilter();
    }

    public function all()
    {
        $fishTypes = $this->FishType->find('all', array(
            'order' => array('name')
        ));

        $this->set(array(
            'fishTypes' => $fishTypes, '_serialize' => 'fishTypes'
        ));
    }
}