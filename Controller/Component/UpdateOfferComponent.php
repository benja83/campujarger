<?php

class UpdateOfferComponent extends Component {
    public function initialize(Controller $controller) {
        $this->controller = $controller;
        $this->controller->loadModel('Offer');
    }

    public function get_offer($id)
    {
        if (!$id) {
            throw new ForbiddenException(__('Id is require for this action'));
        }

        $offer = $this->controller->Offer->findById($id);
        if (!$offer) {
            throw new NotFoundException(__('Offer could not be found'));
        }
        return $offer;
    }
}
