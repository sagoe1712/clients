<?php

namespace sagoe1712\BiClients;

use sagoe1712\Foundation\Model;
class BiClients extends Model
{
    /**
     * @var int|null
     */
    protected ?int $id;
    /**
     * @var string
     */
    protected string $name;

    /**
     * @param string $name
     * @param int|null $id
     */
    public function __construct(
        string $name,
        ?int $id
    )
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $customerName
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

}
