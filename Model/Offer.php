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
        $this->data['Offer']['token'] = String::uuid();
    }
}
