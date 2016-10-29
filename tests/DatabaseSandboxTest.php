<?php

namespace PHPChunkit\Test;

use PHPChunkit\DatabaseSandbox;

class DatabaseSandboxTest extends BaseTest
{
    /**
     * @var DatabaseSandbox
     */
    private $databaseSandbox;

    protected function setUp()
    {
        $this->databaseSandbox = new DatabaseSandboxStub(true, ['mydb']);
    }

    public function testGetTestDatabaseNames()
    {
        $databaseNames = ['mydb' => 'mydb_test'];

        $this->assertEquals($databaseNames, $this->databaseSandbox->getTestDatabaseNames());
    }

    public function testGetSandboxedDatabaseNames()
    {
        $databaseNames = ['mydb' => 'mydb_uniqueid'];

        $this->assertEquals($databaseNames, $this->databaseSandbox->getSandboxedDatabaseNames());
    }
}

class DatabaseSandboxStub extends DatabaseSandbox
{
    protected function generateUniqueId() : string
    {
        return 'uniqueid';
    }
}
