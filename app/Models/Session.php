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

    //создает новую запись в базе или открывает существующую
    public function startSession($sess_id)
    {
        
    }
    
    //проверяет есть ли такой id в базе
	private function isSetSession($sess_id)
    {
        
    }
    
    //update данных в базе
	public function saveSessionData($data)
    {
        
    }
    
    //возвращает текущие данные сессии
	public function getSessionData()
    {
        
    }
    
    //проверяет открыта ли сессия (вызывался ли startSession)
	private function isOpen()
    {
        
    }
    
    //закрывает сессию
	public function closeSession()
    {
        
    }

}
