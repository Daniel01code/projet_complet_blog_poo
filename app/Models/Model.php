<?php
namespace App\Models;

use PDO;
use Database\DBConnection;

abstract class Model{

    protected $db;

    protected $table;

    public function __construct( DBConnection $db) {
        $this->db = $db;
    } 
    public function all(): array{
       
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }
    public function findById(int $id): Model{

        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", $id, true);

    }
    public function query(string $sql, int $param = null, bool $single = null){

        $method = is_null($param)? 'query' : 'prepare'; // s'il y'a rien dans $param on fait un query si non on fait une requette preparé
        $fetch = is_null($single)? 'fetchAll':'fetch';// quand $single est null on fait un fetchAll par contre on fait un fetch

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if($method === 'query'){

            return $stmt->$fetch();

        }else{

            $stmt->execute([$param]);
            return $stmt->$fetch();
        }
    }


}