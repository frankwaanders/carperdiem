<?php

class Pond extends AppModel
{
    public $virtualFields = array (
        'extended_description' => 'CONCAT(Pond.code, " (", Pond.description, ")" )'
    );
}