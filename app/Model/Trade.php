<?php

namespace Model;

use Model\enum\TradeOrderType;
use Model\enum\TradeResult;

class Trade
{
    private int $id;
    private string $date;
    private string $assets;
    private string $comments;
    private int $payout;
    private int $value;
    private int $income;
    private TradeOrderType $tradeOrderType;
    private TradeResult $tradeResult;
    private Operational $operational;

    public function __construct(int $id, string $assets, string $comments, int $payout, int $value,
                                int $income, TradeOrderType $tradeOrderType, TradeResult $tradeResult,
                                Operational $operational)
    {
        $this->id = $id;
        $this->date = date('y-m-d');
        $this->assets = $assets;
        $this->comments = $comments;
        $this->payout = $payout;
        $this->value = $value;
        $this->income = $income;
        $this->tradeOrderType = $tradeOrderType;
        $this->tradeResult = $tradeResult;
        $this->operational = $operational;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Trade
    {
        $this->id = $id;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): Trade
    {
        $this->date = $date;
        return $this;
    }

    public function getAssets(): string
    {
        return $this->assets;
    }

    public function setAssets(string $assets): Trade
    {
        $this->assets = $assets;
        return $this;
    }

    public function getComments(): string
    {
        return $this->comments;
    }

    public function setComments(string $comments): Trade
    {
        $this->comments = $comments;
        return $this;
    }

    public function getPayout(): int
    {
        return $this->payout;
    }

    public function setPayout(int $payout): Trade
    {
        $this->payout = $payout;
        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): Trade
    {
        $this->value = $value;
        return $this;
    }

    public function getIncome(): int
    {
        return $this->income;
    }

    public function setIncome(int $income): Trade
    {
        $this->income = $income;
        return $this;
    }

    public function getTradeOrderType(): TradeOrderType
    {
        return $this->tradeOrderType;
    }

    public function setTradeOrderType(TradeOrderType $tradeOrderType): Trade
    {
        $this->tradeOrderType = $tradeOrderType;
        return $this;
    }

    public function getTradeResult(): TradeResult
    {
        return $this->tradeResult;
    }

    public function setTradeResult(TradeResult $tradeResult): Trade
    {
        $this->tradeResult = $tradeResult;
        return $this;
    }

    public function getOperational(): Operational
    {
        return $this->operational;
    }

    public function setOperational(Operational $operational): Trade
    {
        $this->operational = $operational;
        return $this;
    }

}