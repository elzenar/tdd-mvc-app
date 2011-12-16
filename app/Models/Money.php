<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vovikha
 * Date: 12/16/11
 * Time: 1:10 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models;


//require_once 'AbstractModel.php';


use \PDO;

class Money extends AbstractModel
{

    public function add(array $data)
    {
        $pdo = $this->getConnection();
        $sql = "INSERT INTO money (user_id, category_id, amount) VALUES (:user_id, :category_id, :amount)";

        $query = $pdo->prepare($sql);
        $query->execute(
            array(':user_id'     => $data['user_id'],
                  ':category_id' => $data['category_id'],
                  ':amount'      => $data['amount']
            ));
    }

    public function getSumByUser($userId, $categoryId = null)
    {
        $pdo = $this->getConnection();

        if ($categoryId) {
            $where = "user_id=:user_id AND category_id=:category_id";
            $data = array(':user_id'     => $userId,
                          ':category_id' => $categoryId,
                        );
        } else {
            $where = "user_id=:user_id";
            $data = array(':user_id' => $userId);
        }
        $sql = "SELECT SUM(amount) FROM money"
               ." WHERE " . $where;
        $query = $pdo->prepare($sql);
        $query->execute($data);
        $t = $query->fetch();

        return $t[0];
    }



}
