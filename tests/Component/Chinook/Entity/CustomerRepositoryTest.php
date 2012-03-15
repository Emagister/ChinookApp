<?php

namespace Test\Component\Chinook\Entity;

use PHPUnit_Extensions_Database_TestCase;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Platforms\SqlitePlatform;

class CustomerRepositoryTest extends PHPUnit_Extensions_Database_TestCase
{
    /**
     * @var \Doctrine\DBAL\Connection;
     */
    private $_pdo;

    public function __construct($name = NULL, array $data = array(), $dataName = '')
    {
        $configuration = new Configuration();
        $params = array(
            'driver' => 'pdo_sqlite',
            'memory' => 'true'
        );
        /** @var $conn \Doctrine\DBAL\Connection */
        $conn = DriverManager::getConnection($params, $configuration);

        /** @var $schema \Doctrine\DBAL\Schema\Schema */
        $schema = $conn->getSchemaManager()->createSchema();
        /** @var $customersTable \Doctrine\DBAL\Schema\Table */
        $customersTable = $schema->createTable('Customer');
        $customersTable->addColumn('CustomerId', 'integer', array('notnull' => true));
        $customersTable->addColumn('FirstName', 'string', array('notnull' => true, 'length' => 40));
        $customersTable->addColumn('LastName', 'string', array('notnull' => true, 'length' => 20));
        $customersTable->addColumn('Company', 'string', array('length' => 80));
        $customersTable->addColumn('Address', 'string', array('length' => 70));
        $customersTable->addColumn('City', 'string', array('length' => 40));
        $customersTable->addColumn('State', 'string', array('length' => 40));
        $customersTable->addColumn('Country', 'string', array('length' => 40));
        $customersTable->addColumn('PostalCode', 'string', array('length' => 10));
        $customersTable->addColumn('Phone', 'string', array('length' => 10));
        $customersTable->addColumn('Fax', 'string', array('length' => 24));
        $customersTable->addColumn('Email', 'string', array('length' => 60));
        $customersTable->addColumn('SupportRepId', 'integer', array('notnull' => true));
        $customersTable->setPrimaryKey(array('CustomerId'));

        $queries = $schema->toSql($conn->getDatabasePlatform());

        foreach ($queries as $query) {
            $conn->exec($query);
        }

        $this->_pdo = $conn;

        parent::__construct($name, $data, $dataName);
    }

    /**
     * Returns the test database connection.
     *
     * @return \PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    protected function getConnection()
    {
        return $this->createDefaultDBConnection($this->_pdo->getWrappedConnection(), ':memory:');
    }

    /**
     * Returns the test dataset.
     *
     * @return \PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet()
    {
        return $this->createFlatXMLDataSet(__DIR__ . '/_files/customers.xml');
    }
}