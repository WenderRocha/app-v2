<?php

declare(strict_types=1);

use Model\Book;
use Model\enum\TradeOrderType;
use Model\enum\TradeResult;
use Model\enum\TransactionStatus;
use Model\enum\TransactionType;
use Model\Goal;
use Model\Operational;
use Model\Trade;
use Model\Transaction;
use Model\User;
use Model\Wallet;

require_once "lib/dbug.php";
require_once "app/Model/User.php";
require_once "app/Model/Wallet.php";
require_once "app/Model/Transaction.php";
require_once "app/Model/Book.php";
require_once "app/Model/Goal.php";
require_once "app/Model/Operational.php";
require_once "app/Model/Trade.php";

require_once "app/Model/enum/TransactionType.php";
require_once "app/Model/enum/TransactionStatus.php";
require_once "app/Model/enum/TradeOrderType.php";
require_once "app/Model/enum/TradeResult.php";

require_once "app/Database/Connection.php";

try{
    $conn = Connection::open("database");

    User::setConnection($conn);

    $user = new User(1, 'Wender Rocha', 'wender_dev@hotmail.com',
    '15997644331',
    '12345678');

    $w1 = new Wallet(1,'Quotex','logo', 100, 100, 5, 5, 'BRL');

    $user->addWallet($w1);

    //$user->save();

    $t1 = new Transaction(1, 100,TransactionType::DEPOSIT);
    $t1->setStatus(TransactionStatus::COMPLETED);

    $t2 = new Transaction(2, 60,TransactionType::DEPOSIT);
    $t2->setStatus(TransactionStatus::COMPLETED);

    $t3 = new Transaction(3, 40,TransactionType::DEPOSIT);
    $t3->setStatus(TransactionStatus::COMPLETED);

    $w1->addTransaction($t1);
    $w1->addTransaction($t2);
    $w1->addTransaction($t3);

    $g1 = new Goal(1,'meta 1', 'meta para pagar contas', 2000, $w1);
    $g2 = new Goal(1,'meta 2', 'teclado', 400, $w1);

    $w1->addGoal($g1);
    $w1->addGoal($g2);

    $b1 = new Book(1, $w1);

    $w1->addBook($b1);

    $op1 = new Operational(1, 'Retração M5', '');

    $tr1 = new Trade(1,
        'EUR/USD',
        '',
        82,
        26,
        21,
        TradeOrderType::CALL,
        TradeResult::WIN,$op1);

    $tr2 = new Trade(1,
        'EUR/USD',
        '',
        82,
        26,
        21,
        TradeOrderType::CALL,
        TradeResult::WIN,$op1);

    $tr3 = new Trade(1,
        'EUR/USD',
        '',
        82,
        46,
        51,
        TradeOrderType::PUT,
        TradeResult::LOSS,$op1);


    $b1->addTrade($tr1);
    $b1->addTrade($tr2);
    $b1->addTrade($tr3);

  //dbug(User::delete(17));


}catch (Exception $e){
    echo $e->getMessage();
}
