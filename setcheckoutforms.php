<?php
// setcheckoutforms.php

function validate_required($value, $label, &$errors) {
    if (trim($value) === "") {
        $errors[] = "$label is required.";
    }
}

function validate_name($value, $label, &$errors) {
    if (trim($value) !== "" && !preg_match("/^[a-zA-Z]+(?:[ \-'][a-zA-Z]+)*$/", $value)) {
        $errors[] = "$label is invalid.";
    }
}

function validate_email($value, $label, &$errors) {
    if (trim($value) !== "" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "$label is invalid.";
    }
}

function validate_address($value, $label, &$errors) {
    if (trim($value) !== "" && !preg_match("/^[a-zA-Z0-9\s,.\-'\"]+$/", $value)) {
        $errors[] = "$label is invalid.";
    }
}

function validate_postcode($value, $label, &$errors) {
    if (trim($value) !== "" && !preg_match("/^[A-Za-z0-9\s\-]+$/", $value)) {
        $errors[] = "$label is invalid.";
    }
}
