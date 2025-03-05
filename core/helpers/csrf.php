<?php

function generate_hidden_input_element(){
    $token = bin2hex(random_bytes(32));

    echo '<input type="hidden" name="csrf_token" value="'.$token.'">';
}