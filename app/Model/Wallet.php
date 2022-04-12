<?php

namespace Model;

use Model\enum\TransactionStatus;
use Model\enum\TransactionType;

class Wallet
{
    private int $id;
    private string $name;
    private string $logo;
    private int $initialBalance;
    private int $balance;
    private int $takeProfit;
    private int $stopLoss;
    private string $currency;
    private array $transactions;
    private array $books;
    private array $goals;

    public function __construct(int $id, string $name, string $logo, int $initialBalance, int $balance,
                                int $takeProfit, int $stopLoss, string $currency)
    {
        $this->id = $id;
        $this->name = $name;
        $this->logo = $logo;
        $this->initialBalance = $initialBalance;
        $this->balance = $balance;
        $this->takeProfit = $takeProfit;
        $this->stopLoss = $stopLoss;
        $this->currency = $currency;
        $this->transactions = [];
        $this->books = [];
        $this->goals = [];

    }


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): Wallet
    {
        $this->id = $id;
        return $this;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): Wallet
    {
        $this->name = $name;
        return $this;
    }


    public function getLogo(): string
    {
        return $this->logo;
    }


    public function setLogo(string $logo): Wallet
    {
        $this->logo = $logo;
        return $this;
    }


    public function getInitialBalance(): int
    {
        return $this->initialBalance;
    }


    public function setInitialBalance(int $initialBalance): Wallet
    {
        $this->initialBalance = $initialBalance;
        return $this;
    }


    public function getBalance(): int
    {
        return $this->balance;
    }

    public function getTakeProfit(): int
    {
        return $this->takeProfit;
    }

    public function setTakeProfit(int $takeProfit): Wallet
    {
        $this->takeProfit = $takeProfit;
        return $this;
    }


    public function getStopLoss(): int
    {
        return $this->stopLoss;
    }


    public function setStopLoss(int $stopLoss): Wallet
    {
        $this->stopLoss = $stopLoss;
        return $this;
    }


    public function getCurrency(): string
    {
        return $this->currency;
    }


    public function setCurrency(string $currency): Wallet
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function addTransaction(Transaction $transaction): void
    {
        $this->transactions[] = $transaction;
        $this->checkStatusTransaction($transaction);
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @throws Exception
     */
    private function checkStatusTransaction(Transaction $transaction): void
    {
        if ($transaction->getStatus() == TransactionStatus::COMPLETED) {
            $this->transactionInput($transaction);
        }
    }

    private function TransactionInput(Transaction $transaction): void
    {
        match ($transaction->getType()) {
            TransactionType::DEPOSIT => $this->deposit($transaction->getBalance()),
            TransactionType::WITHDRAW => $this->withdraw($transaction->getBalance()),
            default => throw new Exception("Tipo de transação inválida")
        };
    }

    private function deposit(int $amount): void
    {
        $this->balance += $amount;
    }

    private function withdraw(int $amount): void
    {
        $this->balance -= $amount;
    }

    public function addGoal(Goal $goal): void
    {
        $this->goals[] = $goal;
    }

    public function getGoals(): array
    {
        return $this->goals;
    }

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function getBooks(): array
    {
        return $this->books;
    }
}