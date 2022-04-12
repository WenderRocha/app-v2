<?php

namespace Model;
class Operational
{
    private int $id;
    private string $name;
    private string $description;

    /**
     * @param int $id
     * @param string $name
     * @param string $description
     */
    public function __construct(int $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Operational
     */
    public function setId(int $id): Operational
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Operational
     */
    public function setName(string $name): Operational
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Operational
     */
    public function setDescription(string $description): Operational
    {
        $this->description = $description;
        return $this;
    }

}