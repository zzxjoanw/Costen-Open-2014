<?php
/**
 * Created by PhpStorm.
 * User: Laura 5
 * Date: 4/10/2016
 * Time: 6:47 AM
 */

function getAnnouncements($connection)
{
    $sql = "SELECT * FROM announcementTable";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->execute();
    $preparedStatement->bind_result($title_en,$text_en,$title_kr,$text_kr,$title_ch,$text_ch,$title_jp,$text_jp);

    $list = array();

    while($preparedStatement->fetch())
    {
        $row = array();
        array_push($row,$title_en);
        array_push($row,$text_en);
        array_push($row,$title_kr);
        array_push($row,$text_kr);
        array_push($row,$title_jp);
        array_push($row,$text_jp);
        array_push($row,$title_cn);
        array_push($row,$text_cn);
    }

    return $list;
}

function addAnnouncement() {}

function updateAnnouncement() {}

function deleteAnnouncement() {}