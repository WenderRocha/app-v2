<?php

namespace Model;

use Model\enum\TradeResult;

class Book
{
    private int $id;
    private string $date;
    private string $walletName;
    private int $balance;
    private Wallet $wallet;
    private array $trades;

    public function __construct(int $id, Wallet $wallet)
    {
        $this->id = $id;
        $this->date = date('y-m-d');
        $this->walletName = $wallet->getName();
        $this->balance = $wallet->getBalance();
        $this->wallet = $wallet;
        $this->trades = [];
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Book
    {
        $this->id = $id;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): Book
    {
        $this->date = $date;
        return $this;
    }

    public function getWalletName(): string
    {
        return $this->walletName;
    }

    public function setWalletName(string $walletName): Book
    {
        $this->walletName = $walletName;
        return $this;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): Book
    {
        $this->balance = $balance;
        return $this;
    }

    public function getWallet(): Wallet
    {
        return $this->wallet;
    }

    public function setWallet(Wallet $wallet): Book
    {
        $this->wallet = $wallet;
        return $this;
    }

    public function addTrade(Trade $trade): void
    {
        $this->trades[] = $trade;
    }

    public function getTrades(): array
    {
        return $this->trades;
    }

    public function getQtdTrades(): int
    {
        return count($this->getTrades());
    }

    public function getInvestimentTotal(): int
    {
        $sum = 0;
        foreach ($this->getTrades() as $trade) {
            $sum += $trade->getValue();
        }

        return $sum;
    }

    public function getQtdTradePer(TradeResult $tradeResult)
    {
        $sum = 0;
        foreach ($this->getTrades() as $trade) {

            if ($trade->getTradeResult() == $tradeResult) {
                $sum++;
            }
        }

        return $sum;
    }

    public function getProfitDay(): int
    {
        $sum = 0;
        foreach ($this->getTrades() as $trade) {

            if ($trade->getTradeResult() == TradeResult::WIN) {
                $sum += $trade->getIncome();
            }

        }

        return $sum;
    }

    public function getBalanceLoss(): int
    {
        $sum = 0;
        foreach ($this->getTrades() as $trade) {

            if ($trade->getTradeResult() == TradeResult::LOSS) {
                $sum += $trade->getValue();
            }

        }

        return $sum;
    }

    public function getTotalBalance()
    {
        return $this->getBalance() + $this->getProfitDay();
    }

    public function getGrowthRate()
    {
        $profit = $this->getTotalBalance() - $this->getBalance();
        return ($profit / $this->getBalance()) * 100;

    }

    public function __toString(): string
    {
        return "
            Data: {$this->getDate()} <br>
            Carteira: {$this->getWalletName()}  <br>
            Quantidade de trades: {$this->getQtdTrades()}  <br>
            
            Quantidade de vitórias: {$this->getQtdTradePer(TradeResult::WIN)} <br>
            Quantidade de Derrotas: {$this->getQtdTradePer(TradeResult::LOSS)} <br>
            Quantidade de empates: {$this->getQtdTradePer(TradeResult::DRAW)} <br>
            <b>Valor total investido:</b> {$this->getInvestimentTotal()} <br>
            <b>Valor perdido:</b> {$this->getBalanceLoss()} <br>
            <b>Lucro do dia:</b> {$this->getProfitDay()} <br>
            <b>Saldo da banca:</b> {$this->getTotalBalance()} <br>
            <b>Crescimento da Banca: </b> {$this->getGrowthRate()}%
        ";
    }

}