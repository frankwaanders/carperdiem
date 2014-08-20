<?php

class FishRegistration extends AppModel
{
    public $belongsTo = array(
        'FishType',
        'Pond'
    );

    public $hasMany = array(
        'Photo' => array (
            'foreignKey' => 'fish_registration_id',
            'className' => 'Photo',
            'dependent' => true
        )
    );

    public $virtualFields = array(
        'is_owner' => 'false'
    );

    public function afterFind($results, $primary = false)
    {
        foreach ($results as $key => $val) {

            if (isset($results[$key]['FishRegistration']['fish_weight'])) {
                $results[$key]['FishRegistration']['fish_weight'] = intval($val['FishRegistration']['fish_weight']);
            }
            if (isset($results[$key]['FishRegistration']['fish_length'])) {
                $results[$key]['FishRegistration']['fish_length'] = intval($val['FishRegistration']['fish_length']);
            }
            if (isset($results[$key]['FishRegistration']['is_owner'])) {
                $results[$key]['FishRegistration']['is_owner'] = AuthComponent::user('id') == $results[$key]['FishRegistration']['member_id'];
            }
        }
        return $results;
    }

    public function beforeSave($options = array())
    {
        if ($this->data['FishRegistration']['id'] != null) {
            return $this->data['FishRegistration']['member_id'] == AuthComponent::user('id');
        }

        $this->data['FishRegistration']['member_id'] = AuthComponent::user('id');
        parent::beforeSave($options);
    }

    public function beforeDelete($cascade = true)
    {
        $registration = $this->findById($this->id);
        $authorized = $registration['FishRegistration']['member_id'] == AuthComponent::user('id');

        return $authorized;
    }
}