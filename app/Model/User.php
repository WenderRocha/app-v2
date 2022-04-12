<?php

declare(strict_types=1);

namespace Model;

use PDO;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $phone;
    private string $password;
    private string $created_at;
    private string $updated_at;
    private array $wallets;

    public function __construct(int $id,
                                string $name,
                                string $email,
                                string $phone,
                                string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->created_at = date('y-m-d');
        $this->updated_at = date('y-m-d');
        $this->wallets = [];
    }


    public static function find($id)
    {
        $sql = "SELECT * FROM users WHERE id= {$id}";
        $conn = \DbTransaction::get();
        $result = $conn->query($sql);
        return $result->fetchObject();
    }

    public static function findAll()
    {
        $sql = "SELECT * FROM users";
        $conn = \DbTransaction::get();
        $result = $conn->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public  function save()
    {
        $sql = "INSERT INTO users (name, email, phone, password, created_at)
                VALUES (:name, :email, :phone,:password, :created_at)";

        $conn = \DbTransaction::get();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $this->getName());
        $stmt->bindParam(':email', $this->getEmail());
        $stmt->bindParam(':phone', $this->getPhone());
        $stmt->bindParam(':password', $this->getPassword());
        $stmt->bindParam(':created_at', $this->getCreatedAt());
        $stmt->execute();
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM users WHERE id={$id}";
        $conn = \DbTransaction::get();
        return $conn->query($sql);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public function addWallet(Wallet $wallet)
    {
        $this->wallets[] = $wallet;
    }

    public function getWallets()
    {
        return $this->wallets;
    }
}
