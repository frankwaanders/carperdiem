<?php

class MainController extends AppController
{
    public $helpers = array('Html', 'Form');
    public function index()
    {
        $this->layout = 'carperdiem';
        $this->set('title_for_layout', 'CD-VR tool');
    }
}