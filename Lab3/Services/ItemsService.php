<?php

class ItemsService
{
    private DbConnection $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new DbConnection();
        $this->dbConnection->getDbContext()->setAsGlobal();
        $this->dbConnection->getDbContext()->bootEloquent();
    }

    public function getAllItems(): array
    {
        $index = (isset($_GET["index"]) && is_numeric($_GET["index"]) && $_GET["index"] > 0) ? (int)$_GET["index"] : 0;
        $all_records = $this->dbConnection->getDbContext()::table("items")->skip($index)->take(page_size)->get();
        $next_index = $index + page_size;
        $next_link = "http://localhost:8080/index.php?index=$next_index";
        $previous_index = (($index - page_size) >= 0) ? $index - page_size : 0;
        $previous_link = "http://localhost:8080/index.php?index=$previous_index";

        return [
            "all_records" => $all_records,
            "next_link" => $next_link,
            "previous_link" => $previous_link
        ];
    }

    public function insertItem(array $itemData)
    {
        $this->dbConnection->getDbContext()::table("items")->insert($itemData);
    }
}