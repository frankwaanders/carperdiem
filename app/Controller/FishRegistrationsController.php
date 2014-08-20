<?php

class FishRegistrationsController extends AppController
{
    public $components = array('RequestHandler', 'Paginator');

    public function beforeFilter()
    {
        $this->viewClass = 'Json';
        parent::beforeFilter();
    }

    public function all($limit = null, $offset = null)
    {
        $registrations = $this->FishRegistration->find('all', array(
            'order' => array('FishRegistration.timestamp DESC'),
            'limit' => $limit ? $limit : 10,
            'offset' => $offset ? $offset : 0
        ));

        $total = $this->FishRegistration->find('count');
        $this->response->header(array('X-InlineCount' => $total));

        $this->set(array(
            'registrations' => $registrations, '_serialize' => 'registrations'
        ));
//        $log = $this->FishRegistration->getDataSource()->getLog(false, false);
//        debug($log);
//        exit;
    }

    public function view($id)
    {
        $registration = $this->FishRegistration->findById($id);
        if (!$registration) {
            throw new NotFoundException(__('Invalid id'));
        }

        $this->set(array(
            'registrations' => $registration,
            '_serialize' => 'registrations'
        ));
    }

    public function delete($id)
    {


        if (!$this->FishRegistration->delete($id)) {
            throw new CakeException(__('Delete error'));
        }
        $this->set(array(
            'message' => 'Deleted',
            '_serialize' => array('message')
        ));
    }

    public function save()
    {
        if ($this->request->is('post')) {
            $this->FishRegistration->create();
            if ($this->FishRegistration->save($this->request->data)) {
                $this->set(array(
                    'message' => 'Insert registration succesful.',
                    '_serialize' => array('message')
                ));
            } else {
                throw new CakeException(__('Save error'));
            }
        }
    }
}