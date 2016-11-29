<?php
class Offer extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty',
        ),
        'body' => array(
            'rule' => 'notEmpty',
        ),
        'creator_email' => array(
            'required' => true,
            'rule' => array('email'),
            'message' => 'Kindly provide your email for verification.'
        ),
        'token' => array(
            'required' => true,
            array(
                'rule' => 'isUnique',
                'message' => 'wrong uuid'
            )
        )
    );

    public function beforeSave($options = array()) {
        if (!array_key_exists('id', $this->data['Offer'])) {
            $this->data['Offer']['token'] = String::uuid();
            return;
        }
        $offer = $this->findById($this->data['Offer']['id']);
        if (is_null($offer['Offer']['token'])) {
            $this->data['Offer']['token'] = String::uuid();
        }
    }
}
