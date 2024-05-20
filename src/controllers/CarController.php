<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Car.php';

$database = new Database();
$db = $database->getConnection();

$car = new car($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // create car
    $data = json_decode(file_get_contents("php://input"));

    $car->name = $data->name;
    $car->description = $data->description;
    $car->price_per_day = $data->price_per_day;
    $car->availability_start = $data->availability_start;
    $car->availability_end = $data->availability_end;
    $car->image_url = $data->image_url;

    if($car->create()) {
        echo json_encode(array("message" => "var was created."));
    } else {
        echo json_encode(array("message" => "Unable to create car."));
    }
} else {
    // read cars
    $stmt = $car->read();
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($cars);
}
