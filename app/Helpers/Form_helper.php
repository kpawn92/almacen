<?php
    function display_error($validation, $field)
    {
        if ($validation->hashError($field)) {
            return $validation->getError($field);
        }else {
            return false;
        }
    }

?>