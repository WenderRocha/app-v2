<?php

namespace Model;

use Model\enum\TransactionStatus;
use Model\enum\TransactionType;

class Transaction
{
    private int $id;
    private string $date;
    private int $balance;
    private TransactionType $type;
    private TransactionStatus $Status;

    /**
     * @param int $id
     * @param int $balance
     * @param TransactionType $type
     */
    public function __construct(int $id, int $balance, TransactionType $type)
    {
        $this->id = $id;
        $this->date = date('y-m-d');
        $this->balance = $balance;
        $this->type = $type;
        $this->Status = TransactionStatus::PROGRESS;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }

    public function getType(): TransactionType
    {
        return $this->type;
    }

    public function setType(TransactionType $type): void
    {
        $this->type = $type;
    }

    public function getStatus(): TransactionStatus
    {
        return $this->Status;
    }

    public function setStatus(TransactionStatus $Status): void
    {
        $this->Status = $Status;
    }

}