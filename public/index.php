<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../src/controllers/CarController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Coches</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Renta de Coches</h1>
        <div id="cars" class="mb-5"></div>

        <h2>Agregar Vehículo</h2>
        <form id="carForm" class="mb-5">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="price_per_day">Precio por Día:</label>
                <input type="number" id="price_per_day" name="price_per_day" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="availability_start">Disponibilidad Inicio:</label>
                <input type="date" id="availability_start" name="availability_start" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="availability_end">Disponibilidad Fin:</label>
                <input type="date" id="availability_end" name="availability_end" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image_url">URL de la Imagen:</label>
                <input type="text" id="image_url" name="image_url" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Vehículo</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
