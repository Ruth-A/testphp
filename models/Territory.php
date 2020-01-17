<?php

/**
 * Класс Territory - модель для работы с адресом
 */
class Territory
{

    //Получить массив регионов
    public static function getRegions()
    {
      // Соединение с БД
      $db = Db::getConnection();

      // Массив для хранения данных из запроса
      $regionsList = array();

      // Текст запроса к БД
      $result = $db->query('SELECT ter_id as `id`, ter_name as `name` '
                                  .'FROM `t_koatuu_tree` '
                                  .'WHERE ter_level = 1 '
                                  .'ORDER BY ter_name ASC');

      // Получение данных из запроса
      $i = 0;
      while($row = $result->fetch()) {
        $regionsList[$i]['id'] = $row['id'];
        $regionsList[$i]['name'] = $row['name'];
        $i++;
      }

		  return $regionsList;
    }

    //Получить массив городов по id региона
    public static function getCitysByRegionId($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT ter_id as `id`, ter_name as `name` '
                      .'FROM `t_koatuu_tree` '
                      .'WHERE ter_level = 2 AND ter_pid = :id '
                      .'ORDER BY id DESC ';

        // Получение и возврат результатов
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        // Массив для хранения данных из запроса
        $cityLists = array();

        // Получение данных
        $i = 0;
        while($row = $result->fetch()) {
          $citysList[$i]['id'] = $row['id'];
          $citysList[$i]['name'] = $row['name'];
          $i++;
        }

        return $citysList;
    }

    //Получить районы по id города
    public static function getDistrictsByCityId($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Массив для хранения данных из запроса
        $districtsList = array();

        return self::getDistrictsByParantId($id, $districtsList, $db);
    }

    //Получить все дочерние районы по id родителя
    private static function getDistrictsByParantId($id, &$districtsList, $db) {

      // Текст запроса к БД
      $sql = 'SELECT ter_id as `id`, ter_name as `name` '
                    .'FROM `t_koatuu_tree` '
                    .'WHERE ter_level > 2 AND ter_pid = :id '
                    .'ORDER BY id DESC ';

      // Получение и возврат результатов
      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);

      // Получить данные в виде массива
      $result->setFetchMode(PDO::FETCH_ASSOC);
      $result->execute();

      // Получение данных
      $i = 0;
      while($row = $result->fetch()) {
        array_push($districtsList, ['id' => $row['id'], 'name' => $row['name']]);
        self::getDistrictsByParantId($row['id'], $districtsList, $db);
        $i++;
      }

      return $districtsList;
    }

}
