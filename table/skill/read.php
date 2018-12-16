<?php
/**
 * Created by PhpStorm.
 * User: kryif
 * Date: 14/12/18
 * Time: 18:53
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../config/Database.php";
include_once "../../object/Skill.php";

$database = new Database();
$db = $database->getConnection();

$skill = new Skill($db);

$stmt = $skill->read();
$num = $stmt->rowCount();

if ($num > 0){
    $skill_array = array();
    $skill_array["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
            $skill_item = array(
                "skillid" => $row['skill_id'],
                "skillname" => $row['skill_name'],
                "skilldesc" => $row['skill_desc']
            );

            array_push($skill_array["records"],$skill_item);

    }
    echo json_encode($skill_array);
}else{
    echo json_encode(
        array(
            "message" => "No item found."
        )
    );
}

    ?>