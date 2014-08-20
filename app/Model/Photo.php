<?php

class Photo extends AppModel
{
    public $hasOne = array (
        'FishRegistration' => array (
            'className' => 'FishRegistration'
        )
    );
}