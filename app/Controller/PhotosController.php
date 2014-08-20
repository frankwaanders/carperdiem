<?php

class PhotosController extends AppController
{
    public function beforeFilter()
    {
        $this->viewClass = 'Json';
        parent::beforeFilter();
    }

    public function upload()
    {
        if ($this->request->is('post')) {
            $filename = $this->data['Photo']['uploaded']['name'];
            $fileLocation = WWW_ROOT . DS . 'photos' . DS . Security::hash($filename) . '.jpg';

            $this->request->data['Photo']['filename'] = $filename;
            $this->request->data['Photo']['location'] = $fileLocation;

            if ($this->Photo->save($this->request->data)) {
                move_uploaded_file($this->data['Photo']['uploaded']['tmp_name'], $fileLocation);
                $this->set(array(
                    'message' => 'Photo upload succesful.',
                    '_serialize' => array('message')
                ));
            }
        }
    }

    public function get($fishRegistrationId)
    {
        $photo = $this->Photo->find('all', array(
            'conditions' => array('z')
        ));
    }
}