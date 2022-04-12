<?php

namespace Model;

class Goal
{
    private int $id;
    private string $name;
    private string $description;
    private int $target;
    private int $targetDistance;
    private Wallet $wallet;

    public function __construct(int $id, string $name, string $description, int $target, Wallet $wallet)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->target = $target;
        $this->targetDistance = $this->target - $wallet->getBalance();
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Goal
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Goal
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Goal
    {
        $this->description = $description;
        return $this;
    }

    public function getTarget(): int
    {
        return $this->target;
    }

    public function setTarget(int $target): Goal
    {
        $this->target = $target;
        return $this;
    }

}