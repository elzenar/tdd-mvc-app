<?php
namespace Models;

class SessionException extends \Exception {
	
}

class TestObject {
	private $_id;
	
	public function __construct($id) {
		$this->_id = $id;
	}
	
	public function getId() {
		return $this->_id;
	}
}
class Session
{
    private $_connection;
    private $_sess_id;

    public function __construct()
    {    	
    	$this->_sess_id = null;
        $this->_connection = new \PDO('mysql:host=localhost;dbname=tdd_mvc_app',
                    'root',
                    '',
                    array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    //������� ����� ������ � ���� ��� ��������� ������������
    public function startSession($sess_id)
    {
        
    }
    
    //��������� ���� �� ����� id � ����
	private function isSetSession($sess_id)
    {
        
    }
    
    //update ������ � ����
	public function saveSessionData($data)
    {
        
    }
    
    //���������� ������� ������ ������
	public function getSessionData()
    {
        
    }
    
    //��������� ������� �� ������ (��������� �� startSession)
	private function isOpen()
    {
        
    }
    
    //��������� ������
	public function closeSession()
    {
        
    }

}
