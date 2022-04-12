<?php

namespace Model\enum;
enum TransactionStatus: int
{
    case PROGRESS = 1;
    case COMPLETED = 2;
    case CANCELED = 3;
}