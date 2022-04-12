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

    /**
     * Retona a quantidade de trades realizados no dia.
     * @return int
     */
    public function getQtdTrades(): int
    {
        return count($this->getTrades());
    }

    /**
     * Retorna o investimento total aplicado nos trades do dia.
     * @return int
     */
    public function getInvestimentTotal(): int
    {
        $sum = 0;
        foreach ($this->getTrades() as $trade) {
            $sum += $trade->getValue();
        }

        return $sum;
    }

    /**
     * Retorna a quantidades de trades por WIN, LOSS OU DRAW
     * @param TradeResult $tradeResult
     * @return int
     */
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

    /**
     * Retorna o lucro liquido do dia.
     * @return int
     */
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

    /**
     * Retorna o valor perdido nas operações do dia.
     * @return int
     */
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

    /**
     * Pega o saldo da banca e soma com o lucro do dia.
     * @return int
     */
    public function getTotalBalance()
    {
        return $this->getBalance() + $this->getProfitDay();
    }

    /**
     * Retorna o crecismento da banca em porcentagem @return float|int
     */
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