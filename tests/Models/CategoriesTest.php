<?php
class Models_CategoriesTest extends PHPUnit_Extensions_Database_TestCase
{
    protected $object;

    public function setUp()
    {
        $this->object = new \Models\Category();
        parent::setUp();
    }


    /**
     * @test
     */
    public function testRowCount()
    {
        $this->assertEquals(3, $this->getConnection()->getRowCount('categories'), "Pre-Condition");
    }


    /**
     * @test
     */
    public function save()
    {
        $expectedDataSet = $this->loadDataSet('Categories_OneTestCategory')->getTable('categories');
        /* @var $expectedDataSet PHPUnit_Extensions_Database_DataSet_ITable */
        $nameForInsert = $expectedDataSet->getValue(0,'name');

        $this->object->name = $nameForInsert;
        $this->object->save();

        $actualDataSet = $this->getConnection()
            ->createQueryTable('category',"select `name` from `categories` where `name` = 'Test category'");

        $this->assertTablesEqual($expectedDataSet, $actualDataSet);
    }

    /**
     * @test
     */
    public function listAll() {
        $originalCount = $this->getConnection()->getRowCount('categories');
        $list = $this->object->listAll();
        $this->assertEquals($originalCount, count($list));
    }

    /**
     * @test
     */
    public function load() {
        $idForLoad = $this->getDataSet()->getTable('categories')->getValue(0, 'id');
        $expectedName = $this->getDataSet()->getTable('categories')->getValue(0, 'name');
        $category = $this->object->load($idForLoad);
        $this->assertEquals($expectedName, $category->name);
    }


    public function getConnection()
    {

        $config = $this->getConfig();
        $host = $config['db']['host'];
        $db = $config['db']['db'];
        $login = $config['db']['user'];
        $password = $config['db']['password'];

        $pdo = new PDO(
            "mysql:host={$host};dbname={$db}",
            $login,
            $password
        );
        return $this->createDefaultDBConnection($pdo, $db);
    }

    /**
     * Returns the test dataset.
     *
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/category.xml');
    }

    protected function getConfig($environment = 'test') {
        $config = include realpath(dirname(__FILE__).'/../../app/config.php');
        if (is_null($environment)) {
            $environment = 'test';
        }
        return $config[$environment];
    }

    protected function loadDataSet($name) {
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/'.$name.'.xml');
    }
}