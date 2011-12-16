<?php


class MoneyTest extends PHPUnit_Extensions_Database_TestCase
{
    protected $object;

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=tdd_mvc_app_default',
            'root',
            '');
        return $this->createDefaultDBConnection($pdo, 'tdd_mvc_app_default');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        $users = $this->createFlatXmlDataSet(dirname(__FILE__).'/_files//money/users.xml');
        $categories = $this->createFlatXmlDataSet(dirname(__FILE__).'/_files/money/categories.xml');
        $money = $this->createFlatXmlDataSet(dirname(__FILE__).'/_files/money/money.xml');

        return new PHPUnit_Extensions_Database_DataSet_CompositeDataSet(array($users, $categories, $money));
    }

    public function setUp()
    {
        parent::setUp();
        $this->object = new \Models\Money();
    }

    public function testRowCount()
    {
        $this->assertEquals(6, $this->getConnection()->getRowCount('money'), "Check Money count");
    }



    public function testAddMoney()
    {
        //Arrange
        $data = array(
            'category_id' => 1,
            'user_id'     => 1,
            'amount'      => 5,
        );

        $queryTable = $this->getConnection()->createQueryTable(
            'money',
            "SELECT user_id, amount, category_id FROM money
                      WHERE user_id=1 AND category_id=1 AND amount=5"
        );

        $expectedTable = $this->createFlatXmlDataSet(dirname(__FILE__).'/_files/money/expected.xml')
                                      ->getTable("money");
        //Act
        $this->object->add($data);
        //Assert
        $this->assertTablesEqual($expectedTable, $queryTable);

    }

    public function testSumByUserAndCategory()
    {
        //Arrange
        $userId     = 2;
        $categoryId = 1;
        //Act
        $result = $this->object->getSumByUser($userId, $categoryId);
        //Assert
        $this->assertSame(110.00, (float) $result);
    }

    public function testSumByUser()
    {
        //Arrange
        $userId     = 2;
        //Act
        $result = $this->object->getSumByUser($userId);
        //Assert
        $this->assertSame(125.00, (float) $result);
    }

}