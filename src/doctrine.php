<?php

use Doctrine\ORM\EntityManager; // uso das entidades
use Doctrine\Common\Cache\ArrayCache;   // cache
use Doctrine\ORM\Configuration;

$paths = [
    __DIR__ . '/Entity'
];

// Modo de desenvolvimento
$isDev = true;

$cache = new ArrayCache();

// Configuracoes do BD
$dbParams = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'doctrine'
];

// Configuracao do Setup
$config = new Configuration();
$config->setMetadataCacheImpl($cache);
$driverImpl = $config->newDefaultAnnotationDriver($paths);
$config->setMetadataDriverImpl($driverImpl);
$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__ . '/../proxy');
$config->setProxyNamespace('App\Proxies');
//deixar false em producao pq em dev ira gerar o proxy toda hora quando a gente alterar uma entidade
$config->setAutoGenerateProxyClasses(true);

$entityManager = EntityManager::create($dbParams, $config);

function getEntityManager()
{
    global $entityManager;
    return $entityManager;
}