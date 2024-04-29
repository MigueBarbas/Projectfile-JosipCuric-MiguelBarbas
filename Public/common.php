<?php
function escape($data) {
    // Check if $data is null or empty
    if ($data === null || $data === '') {
        return $data;
    }
    
    // Apply htmlspecialchars() only if $data is not null or empty
    $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
