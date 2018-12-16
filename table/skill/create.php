<?php
/**
 * Created by PhpStorm.
 * User: kryif
 * Date: 14/12/18
 * Time: 19:35
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../../config/Database.php";
include_once "../../object/Skill.php";

$database = new Database();
$db = $database->getConnection();

$skill = new Skill($db);

$data = json_decode(file_get_contents("php://input",true));

$skill->skillname = $data->skillname;
$skill->skilldesc = $data->skilldesc;


if ($skill->create()){
    echo '{';
    echo '"message": "Success to add data."';
    echo '}';
}else{
    echo '{';
    echo '"message": "Unable to add data."';
    echo '}';
}


?>