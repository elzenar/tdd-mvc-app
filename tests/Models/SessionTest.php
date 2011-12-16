<?php 

class SessionTestCase extends PHPUnit_Extensions_Database_TestCase {
	
/**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=tdd_mvc_app',
            'root',
            '');
        return $this->createDefaultDBConnection($pdo, 'tdd_mvc_app');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/session_files/session.xml');
    }
    
	public function testRowCount()
    {
        $this->assertEquals(2, $this->getConnection()->getRowCount('session'), "Pre-Condition");
    }
    
	public function testNewRecord()
    {
        $session = new \Models\Session();
        $session->startSession('new_session_id');

        $this->assertEquals(3, $this->getConnection()->getRowCount('session'), "StartSession Fail!");
    }
    
	public function testOpenRecord()
    {
        $session = new \Models\Session();
        $session->startSession('exist_session_id');

        $this->assertEquals(2, $this->getConnection()->getRowCount('session'), "Dublicate SessionId!");
    }
    
    /**
	 * @expectedException SessionException
	 */
	public function testCloseSession()
    {
        $session = new \Models\Session();
        $session->closeSession();
		$session->getSessionData();        
    }
    
	/**
	 * @expectedException SessionException
	 */
	public function testSaveToCloseSession()
    {
        $session = new \Models\Session();
        $data = new \Models\TestObject(12);       
		$session->saveSessionData(serialize($data));        
    }
    
	/**
	 * @expectedException SessionException
	 */
	public function testGetFromCloseSession()
    {
        $session = new \Models\Session();      
		$session->getSessionData();        
    }
    
	public function testSaveSession()
    {
        $session = new \Models\Session();
       	$session->startSession('exist_session_id');
       	$data = new \Models\TestObject(12);
       
		$session->saveSessionData(serialize($data));    

		$queryTable = $this->getConnection()->createQueryTable(
                    'session', 'SELECT * FROM session'
                );
        $expectedTable = $this->createFlatXmlDataSet(dirname(__FILE__).'/session_files/sessionData.xml')
                              ->getTable("session");
        $this->assertTablesEqual($expectedTable, $queryTable);
    }
    
	public function testGetSession()
    {
        $session = new \Models\Session();
       	$session->startSession('exist_session_id');
       	$data = new \Models\TestObject(12);       
		$session->saveSessionData(serialize($data)); 

		$getData = unserialize( $session->getSessionData() ); 
		
		$this->assertEquals(12, $getData->getId(), "getSessionData Fail!");
    }
    
    
	
}


