<?php

class TokenValidatorComponent extends Component {
    public function validate($offer, $token)
    {
        if (!$token) {
            return false;
        }
        if ($offer['Offer']['token'] == $token) {
            return true;
        }
        return false;
    }
}
