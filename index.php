<?php

include 'vendor/autoload.php';

$clientsRepo = new \sagoe1712\BiClients\Repository(
    new sagoe1712\BiClients\Mapper(
        new \Doctrine\DBAL\Connection([
            'host' => '192.168.33.200',
            'dbname' => 'broker_insight',
            'user' => 'root',
            'password' => ''
        ], new \Doctrine\DBAL\Driver\PDOMySql\Driver()),
        new \sagoe1712\BiClients\Collection\Factory()
    )
);

$newClient = $clientsRepo->getNew(
    'Achme Broker Ltd',
);

$newClient = $clientsRepo->save($newClient);
echo $newClient->getId();
