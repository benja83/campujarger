<?php
class OffersController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');

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

    public function add() {
        if ($this->request->is('post')) {
            $this->Offer->create();
            if ($this->Offer->save($this->request->data)) {
                $this->Session->setFlash('Your offer has been saved.');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Unable to add your offer.');
        }
    }
}
