<?php
class OffersController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Mail', 'UpdateOffer', 'TokenValidator');

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
        $token = $this->request->query('token');
        if ($this->TokenValidator->validate($offer, $token)) {
            $this->set('token', $token);
        }
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
        $offer = $this->UpdateOffer->get_offer($id);
        $token = $this->request->query('token');

        if ($this->request->is(array('post', 'put'))) {
            if ($this->TokenValidator->validate($offer, $token)) {
                if ($this->Offer->save($this->request->data)) {
                    $this->Session->setFlash('Your offer has been updated.');
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash('Unable to update your offer.');
            } else {
                $this->Session->setFlash('Invalid credentials for this action');
                return $this->redirect(array('action' => 'view', $id));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $offer;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $offer = $this->UpdateOffer->get_offer($id);
        $token = $this->request->query('token');

        if ($this->TokenValidator->validate($offer, $token)) {
            if ($this->Offer->delete($id)) {
                $this->Session->setFlash(
                    __('The post with id: %s has been deleted.', h($id))
                );
            } else {
                $this->Session->setFlash(
                    __('The post with id: %s could not be deleted.', h($id))
                );
            }
        } else {
            $this->Session->setFlash('Invalid credentials for this action');
            return $this->redirect(array('action' => 'view', $id));
        }

        return $this->redirect(array('action' => 'index'));
    }
}
