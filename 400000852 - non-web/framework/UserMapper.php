<?php
class UserMapper extends DataMapper
{
    private $selectStmt;
    private $updateStmt;
    private $insertStmt;

    public function __construct()
    {
        parent::__construct();
        $this->selectStmt = $this->pdo->prepare(
            "SELECT * FROM users WHERE id=?"
        );
        $this->updateStmt = $this->pdo->prepare(
            "UPDATE users SET name=?, id=? WHERE id=?"
        );
        $this->insertStmt = $this->pdo->prepare(
            "INSERT INTO users (name, email, password) VALUES(?,?,?)"
        );
    }

    protected function targetClass(): string
    {
        return User::class;
    } 

    protected function createObject(array $raw)
    {
        $obj = new User($raw['id'],$raw['email'], $raw['name']);
        return $obj;
    }

    protected function insert(Inde $object)
    {
        $data = [$object->getId(), $object->getName(), $object->getEmail()];
        $this->insertStmt->execute($data);
        $id = $this->pdo->lastInsertId();
        $object->setId((int)$id);
    }

    public function update(User $object)
    {
        $values = [
            $object->getName(),
            $object->getEmail(),
            $object->getId()
        ];
        $this->updateStmt->execute($values);
    }

    public function selectStmt()
    {
        return $this-selectStmt();
    }
}