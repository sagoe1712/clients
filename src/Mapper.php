<?php

namespace sagoe1712\BiClients;

use Doctrine\DBAL\Query\QueryBuilder;
use sagoe1712\BiClients\Collection\Collection;
use sagoe1712\Foundation;
use Exception;
class Mapper extends  Foundation\Mapper
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return BiClients::class;
    }

    /**
     * @param array $data
     * @return BiClients
     */
    protected function instantiateModel(array $data): BiClients
    {

        return parent::instantiateModel($data);
    }

    /**
     * @return QueryBuilder
     */
    public function getBaseQuery(): QueryBuilder
    {
        // Get the database query builder.
        $queryBuilder = $this->getQueryBuilder();

        // Return a start point for a Entity.
        return $queryBuilder->select(
           'clients.name',
           'clients.id'
        )->from('clients', 'clients');
    }

    /**
     * @param BiClients $policy
     * @return BiClients
     * @throws \Doctrine\DBAL\Exception
     */
    public function save(BiClients $client): BiClients
    {
        $queryBuilder = $this->buildSave($this->getQueryBuilder(), 'clients', [
            'id' => ':id',
            'name' => ':name',
        ], [
            'id' => $client->getId(),
            'name' => $client->getName(),
        ]);

        $queryBuilder->execute();

        // Set ID for an insert.
        if (is_null($client->getId())) {
            $client->setId($queryBuilder->getConnection()->lastInsertId());
        }

        return $client;
    }

    /**
     * Get activity log by id.
     *
     * @param int $id
     * @return Collection
     * @throws \Doctrine\DBAL\Exception
     */
    public function getById(int $id): Foundation\Collection\CollectionInterface
    {
        $result = $this->getBaseQuery()
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAll();

        return $this->bindToCollection($result, $this->collectionFactory->getCollection());
    }

}
