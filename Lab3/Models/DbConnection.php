<?php

use Illuminate\Database\Capsule\Manager as DbContext;

class DbConnection
{
    private DbContext $dbContext;

    /**
     * @return DbContext
     */
    public function getDbContext(): DbContext
    {
        return $this->dbContext;
    }

    /**
     * @param DbContext $dbContext
     */
    public function setDbContext(DbContext $dbContext): void
    {
        $this->dbContext = $dbContext;
    }

    public function __construct()
    {
        $this->dbContext = new DbContext();
        $this->dbContext->addConnection(connection_string);
    }
}