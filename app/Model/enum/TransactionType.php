<?php

namespace Model\enum;
enum TransactionType: int
{
    case DEPOSIT = 1;
    case WITHDRAW = 2;
    case TRANSFER = 3;
}