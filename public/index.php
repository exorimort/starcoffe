<?php

chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

require 'vendor/autoload.php';

use StarCoffe\Cafe;
use StarCoffe\Item;
use StarCoffe\CaixaRegistradora;
use StarCoffe\CafeValorRepository;

session_start();

if ($_SERVER['REQUEST_URI'] == '/') {
    $caixaRegistradora = $_SESSION['caixaRegistradora'];

    include __DIR__ . '/../view/caixa-registradora.phtml';
}

if ($_SERVER['REQUEST_URI'] == '/registrar') {
    $cafeValorRepository = new CafeValorRepository();

    try {
        $cafe = new Cafe($_POST['cafe']);
    } catch (\Exception $e) {
        $erro = $e->getMessage();
        include __DIR__ . '/../view/erro.phtml';
        die();
    }

    $item = new Item(
        $cafe,
        $_POST['quantidade'],
        $cafeValorRepository->find($cafe)
    );

    $caixaRegistradora = new CaixaRegistradora();

    if (isset($_SESSION['caixaRegistradora'])) {
        $caixaRegistradora = $_SESSION['caixaRegistradora'];
    }

    $caixaRegistradora->registrar($item);

    $_SESSION['caixaRegistradora'] = $caixaRegistradora;

    header('Location: /');
}