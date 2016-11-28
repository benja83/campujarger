<?php

class UpdateOfferValidatorComponent extends Component {
    public function initialize(Controller $controller) {
        $this->controller = $controller;
    }

    public function get_validated_offer($id, $token = true)
    {
        $this->controller->loadModel('Offer');

        if (!$id) {
            throw new NotFoundException(__('Id is require for this action'));
        }
        if (!$token) {
            throw new NotFoundException(__('Token is require for this action'));
        }

        $offer = $this->controller->Offer->findById($id);
        if (!$offer) {
            throw new NotFoundException(__('Offer could not be found'));
        }

        return $offer;
    }
}
