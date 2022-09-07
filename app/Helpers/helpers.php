<?php


if (!function_exists('hashedEmail')) {
    function hashedEmail($email)
    {
        return crypt($email, saltCode());
    }
}
if (!function_exists('saltCode')) {
    function saltCode()
    {
        return '$6$rounds=5000$car-app$';
    }
}
