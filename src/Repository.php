<?php

namespace sagoe1712\BiClients;

use sagoe1712\BiClients;
use sagoe1712\Foundation;
use sagoe1712\BiClients\Collection\Collection;
use Doctrine\DBAL\Exception;

class Repository extends Foundation\Repository
{
    /**
     * @param BiClients\Mapper $mapper
     */
    public function __construct(BiClients\Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @param string $name
     * @param int|null $id
     * @return \sagoe1712\BiClients\BiClients
     */
    public function getNew(
        string $name,
        ?int $id = null
    ): BiClients\BiClients {
        return new BiClients\BiClients(
            $name,
            $id
        );
    }

    /**
     * @param \sagoe1712\BiClients\BiClients $client
     * @return \sagoe1712\BiClients\BiClients
     * @throws Exception
     */
    public function save(BiClients\BiClients $client): BiClients\BiClients
    {
        return $this->mapper->save($client);
    }

    /**
     * Get policy by id.
     *
     * @param int $id
     * @return Collection
     * @throws Exception
     */
    public function getById(int $id): Collection
    {
        return $this->mapper->getById($id);
    }

}
