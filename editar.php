<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;

DEFINE('TITLE', 'Editar vaga');

// Validação do id
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

// Consulta a vaga
$objVaga = Vaga::getVaga($_GET['id']);

// Validação da vaga
if(!$objVaga instanceof Vaga) {
    header('location: index.php?status=error');
    exit;
}

// Validação do POST
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {

    $objVaga->setTitulo($_POST['titulo']);
    $objVaga->setDescricao($_POST['descricao']);
    $objVaga->setAtivo($_POST['ativo']);
    $objVaga->atualizar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
