<?php
class OffersController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('offers', $this->Offer->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid offer'));
        }

        $offer = $this->Offer->findById($id);
        if (!$offer) {
            throw new NotFoundException(__('Invalid offer'));
        }
        $this->set('offer', $offer);
    }
}
