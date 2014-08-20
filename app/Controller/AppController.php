<?php


class AppController extends Controller
{
    public $components = array(
        'Session',
        'Auth' => array(
            'authError' => 'U bent niet ingelogd. Log eerst in om de pagina te mogen bekijken.',
            'loginRedirect' => array(
                'controller' => 'main',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login')
        )
    );

    public function beforeFilter()
    {
        $this->set('title_for_layout', 'CD-VR tool');
        $this->Auth->authenticate = array(
            'all' => array('userModel' => 'User'),
            'Form'
        );
    }
}
