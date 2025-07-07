<?php

function isLoggedIn(): bool{
    return isset($_SESSION['user']);

}

function isVendeur(){
    return isset($_SESSION['user']) && $_SESSION['user']['typePerson'] === 'VENDEUR';
}

function isClient(){
    return isset($_SESSION['user']) && $_SESSION['user']['typePerson'] === 'CLIENT';
}

