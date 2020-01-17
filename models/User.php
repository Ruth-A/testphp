<?php

/**
 * Класс User - модель для работы с пользователями
 */
class User
{

    public static function getAll()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Массив для хранения данных из запроса
        $usersList = array();

        // Текст запроса к БД
        $result = $db->query('SELECT `users`.id, `users`.full_name, `users`.email, `t_koatuu_tree`.ter_address as `address` '
                                    .'FROM `users` '
                                    .'INNER JOIN `t_koatuu_tree` ON `users`.ter_id=`t_koatuu_tree`.ter_id '
                                    .'ORDER BY id ASC ');

        // Получение данных из запроса
		$i = 0;
		while($row = $result->fetch()) {
			$usersList[$i]['id'] = $row['id'];
			$usersList[$i]['address'] = $row['address'];
			$usersList[$i]['full_name'] = $row['full_name'];
			$usersList[$i]['email'] = $row['email'];
			$i++;
		}

		return $usersList;
    }

    public static function getUserById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT `users`.id, `users`.full_name, `users`.email, `t_koatuu_tree`.ter_address as `address` '
                                    .'FROM `users` '
                                    .'INNER JOIN `t_koatuu_tree` ON `users`.ter_id=`t_koatuu_tree`.ter_id '
                                    .'WHERE `users`.id = :id '
                                    .'ORDER BY id DESC ';

        // Получение и возврат результатов
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function create($fullName, $email, $ter_id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO users (full_name, email, ter_id) '
                . 'VALUES (:full_name, :email, :ter_id)';

        // Получение и возврат результатов
        $result = $db->prepare($sql);
        $result->bindParam(':full_name', $fullName, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':ter_id', $ter_id, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function checkEmail($email)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id FROM users WHERE email = :email';

        // Получение результатов
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->execute();

        // Обращаемся к записи
        $user = $result->fetch();

        // Если запись существует, возвращаем id пользователя
        if ($user) {
            return $user['id'];
        }
        return false;
    }
    
}
