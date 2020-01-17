<?php

/**
 * Контроллер TerritoryController
 */
class TerritoryController
{
    // Получаем JSON городов по id региона
    public function citysList($id)
    {
        // Получаем список городов по ter_id региона
        $regions = Territory::getCitysByRegionId($id);

        // Формируем ответ в формате json
        header('Content-Type: application/json');
        echo json_encode($regions);

        return true;
    }

    // Получаем JSON райнов по id города
    public function districtsList($id)
    {
        // Получаем список райнов по ter_id региона
        $districts = Territory::getDistrictsByCityId($id);

        // Формируем ответ в формате json
        header('Content-Type: application/json');
        echo json_encode($districts);

        return true;
    }

}
