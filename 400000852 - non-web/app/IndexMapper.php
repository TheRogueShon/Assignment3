<?php
class IndexMapper extends DataMapper
{
    private $selectStmt;
    private $updateStmt;
    private $insertStmt;

    public function __construct()
    {
        parent::__construct();
        $this->selectStmt = $this->pdo->prepare(
            "SELECT * FROM instructors WHERE id=?"
        );
        $this->updateStmt = $this->pdo->prepare(
            "UPDATE instructors SET name=?, id=? WHERE id=?"
        );
        $this->insertStmt = $this->pdo->prepare(
            "INSERT INTO instructors (name) VALUES(?)"
        );
    }

    protected function targetClass(): string
    {
        return IndexModel::class;
    } 

}