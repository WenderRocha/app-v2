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

    /**
     * @param int $id
     * @param string $date
     * @param string $assets
     * @param string $comments
     * @param int $payout
     * @param int $value
     * @param int $income
     * @param TradeOrderType $tradeOrderType
     * @param TradeResult $tradeResult
     * @param Operational $operational
     */
    public function __construct(int         $id, string $assets, string $comments, int $payout, int $value,
                                int         $income, TradeOrderType $tradeOrderType, TradeResult $tradeResult,
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Trade
     */
    public function setId(int $id): Trade
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return Trade
     */
    public function setDate(string $date): Trade
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getAssets(): string
    {
        return $this->assets;
    }

    /**
     * @param string $assets
     * @return Trade
     */
    public function setAssets(string $assets): Trade
    {
        $this->assets = $assets;
        return $this;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     * @return Trade
     */
    public function setComments(string $comments): Trade
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return int
     */
    public function getPayout(): int
    {
        return $this->payout;
    }

    /**
     * @param int $payout
     * @return Trade
     */
    public function setPayout(int $payout): Trade
    {
        $this->payout = $payout;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return Trade
     */
    public function setValue(int $value): Trade
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getIncome(): int
    {
        return $this->income;
    }

    /**
     * @param int $income
     * @return Trade
     */
    public function setIncome(int $income): Trade
    {
        $this->income = $income;
        return $this;
    }

    /**
     * @return TradeOrderType
     */
    public function getTradeOrderType(): TradeOrderType
    {
        return $this->tradeOrderType;
    }

    /**
     * @param TradeOrderType $tradeOrderType
     * @return Trade
     */
    public function setTradeOrderType(TradeOrderType $tradeOrderType): Trade
    {
        $this->tradeOrderType = $tradeOrderType;
        return $this;
    }

    /**
     * @return TradeResult
     */
    public function getTradeResult(): TradeResult
    {
        return $this->tradeResult;
    }

    /**
     * @param TradeResult $tradeResult
     * @return Trade
     */
    public function setTradeResult(TradeResult $tradeResult): Trade
    {
        $this->tradeResult = $tradeResult;
        return $this;
    }

    /**
     * @return Operational
     */
    public function getOperational(): Operational
    {
        return $this->operational;
    }

    /**
     * @param Operational $operational
     * @return Trade
     */
    public function setOperational(Operational $operational): Trade
    {
        $this->operational = $operational;
        return $this;
    }


}