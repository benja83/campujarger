<?php
class OffersController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Mail');

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
            $offer = $this->Offer->save($this->request->data);
            if ($offer) {
                $this->Session->setFlash('Your offer has been saved.');
                $this->Mail->sendEmailTo($offer['Offer']['creator_email']);
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Unable to add your offer.');
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid offer'));
        }

        $offer = $this->Offer->findById($id);
        if (!$offer) {
            throw new NotFoundException(__('Invalid offer'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Offer->id = $id;
            if ($this->Offer->save($this->request->data)) {
                $this->Session->setFlash('Your offer has been updated.');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Unable to update your offer.');
        }

        if (!$this->request->data) {
            $this->request->data = $offer;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Offer->delete($id)) {
            $this->Session->setFlash(
                __('The post with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Session->setFlash(
                __('The post with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
}
