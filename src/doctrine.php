<?php

use Doctrine\ORM\Tools\Setup;   // anotacoes
use Doctrine\ORM\EntityManager; // uso das entidades

$paths = [
    __DIR__ . '/Entity'
];

// Modo de desenvolvimento
$isDev = true;

// Configuracoes do BD
$dbParams = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'doctrine'
];

// Configuracao do Setup
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDev);

$entityManager = EntityManager::create($dbParams, $config);

function getEntityManager()
{
    global $entityManager;
    return $entityManager;
}