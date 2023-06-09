<?php 
namespace App\Models;

use App\Classes\Database;

class Category
{
    protected $table = 'category_products';
    protected $id;
    protected $name;
    protected $image;
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    // GET METHODS
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImage()
    {
        return $this->image;
    }

    // SET METHODS
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    // CRUD OPERATIONS
    public function create(array $data)
    {
        $table = $this->table;
        $keys = implode(",", array_keys($data));
        $values = implode(",", array_values($data));
        $values = array_map(function($value) {
            if(!is_numeric($value) && $value != 'null') {
                return "'".$value."'";
            }
            return $value;
        }, array_values($data));
        $valuesmaped = implode(',', $values);
        $this->database->query("INSERT INTO $table($keys) VALUES($valuesmaped)");
        $this->database->getQuery()->execute();
    }

    public function select(int $id)
    {
        $table = $this->table;
        $this->database->query("SELECT * from $table WHERE id = $id");
        return json_encode($this->database->single());
    }

    public function selectAll(): string
    {
        $table = $this->table;
        $this->database->query("SELECT * from $table LEFT JOIN imposto ON (imposto.id = $table.imposto_id)");
        return json_encode($this->database->resultset());
    }


    public function update(int $id, array $data)
    {

    }

    public function delete(int $id)
    {

    }
}