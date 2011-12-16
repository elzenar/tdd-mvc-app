<?php
namespace Models;
/**
 * Created by JetBrains PhpStorm.
 * User: verber
 * Date: 16.12.11
 * Time: 13:02
 * To change this template use File | Settings | File Templates.
 */
abstract class AbstractModel
{
    protected $defaultEnv = 'default';

    protected $connection;

    public function getConnection()
    {
        if (empty($this->connection)) {
            $this->connection = new \PDO('mysql:host=localhost;dbname=tdd_mvc_app_default',
                                'root',
                                '');
        }
        return $this->connection;
    }




}
