<?php

namespace App\Models;

use App\Lib\Db;

class User
{
    public function __construct(
        public private(set) int $id,
        public private(set) string $login,
        public private(set) string $password,
        public private(set) int $counter
    )
    {

    }

    public function save(): void
    {
        $db = Db::getPdo();
        if ($this->id === 0) {
            $stm = $db->prepare("insert into users (login, password, counter) values (?, ?, ?)");
            $stm->execute([$this->login, $this->password, $this->counter]);
            $this->id = $db->lastInsertId();
        } else {
            $stm = $db->prepare("update users set login = ?, password = ?, counter = ? where id = ?");
            $stm->execute([$this->login, $this->password, $this->counter, $this->id]);
        }
    }

    public function checkPassword(string $password): void
    {
        if (!password_verify($password, $this->password)) {
            throw new \Exception("Wrong password");
        }
    }

    public static function create($login, $password): self
    {
        $user = new self(0, $login, password_hash($password, PASSWORD_DEFAULT), 0);
        $user->save();
        return $user;
    }

    public function incCounter(): void
    {
        $this->counter += 1;
    }

    public function resetCounter(): void
    {
        $this->counter = 0;
    }

    public static function findById(int $id, bool $lock = false): self
    {
        $db = Db::getPdo();
        $stm = $db->prepare("select * from users where id = ? " . ($lock ? "for update" : ""));
        $stm->execute([$id]);
        $data = $stm->fetch(\PDO::FETCH_ASSOC);
        if (!$data) {
            throw new \Exception("User not found");
        }
        return new self($id, $data['login'], $data['password'], $data['counter']);
    }

    public static function findByLogin(string $login): self
    {
        $db = Db::getPdo();
        $stm = $db->prepare("select * from users where login = ?");
        $stm->execute([$login]);
        $data = $stm->fetch(\PDO::FETCH_ASSOC);
        if (!$data) {
            throw new \Exception("User not found");
        }
        return new self($data['id'], $data['login'], $data['password'], $data['counter']);
    }
}