<?php
class Car {
    private $conn;
    private $table_name = "cars";

    public $id;
    public $name;
    public $description;
    public $price_per_day;
    public $availability_start;
    public $availability_end;
    public $image_url;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
            (name, description, price_per_day, availability_start, availability_end, image_url) 
            VALUES 
            (:name, :description, :price_per_day, :availability_start, :availability_end, :image_url)";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price_per_day = htmlspecialchars(strip_tags($this->price_per_day));
        $this->availability_start = htmlspecialchars(strip_tags($this->availability_start));
        $this->availability_end = htmlspecialchars(strip_tags($this->availability_end));
        $this->image_url = htmlspecialchars(strip_tags($this->image_url));

        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price_per_day", $this->price_per_day);
        $stmt->bindParam(":availability_start", $this->availability_start);
        $stmt->bindParam(":availability_end", $this->availability_end);
        $stmt->bindParam(":image_url", $this->image_url);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
