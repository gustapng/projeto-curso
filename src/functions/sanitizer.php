<?php

function sanitizerString($data, $filters) {
    return filter_var_array($data, $filters);
}

?>