<?php
$regexName = "/^[a-zA-Z\s]+$/";
$regexMail = "/^[a-zA-Z\d]+@[a-zA-Z\d]+\.[a-zA-z\d]{2,5}+$/";
$regexPhone = "/^[\d]{10}+$/";
$regexDate = "/^[\d-]+$/";


function removeTags($formValues) : array
{
    $newValues = array();

    foreach ($formValues as $formValue) {
        array_push($newValues,strip_tags($formValue));
    }

    return $newValues;
}

function checkNameInput($formValue): bool
{
    global $regexName;

    return preg_match($regexName, $formValue);
}

function checkMailInput($formValue): bool
{
    global $regexMail;

    return preg_match($regexMail, $formValue);
}

function checkPhoneInput($formValue): bool
{
    global $regexPhone;

    return preg_match($regexPhone, $formValue);
}

function checkDateInput($formValue): bool
{
    global $regexDate;

    if (preg_match($regexDate, $formValue)) {
        str_replace("/","-",$formValue);
        list($day, $month, $year) = explode('-', $formValue);
        return checkdate($month,$day,$year);
    }
}
