<?php

namespace Entity;

class Entity extends DatabaseConnection  {

    // Table de la base de données
    protected $table;

    // Instance de connexion
    private $db;

    public function makeQuery(string $sql, array $attributes = null)
    {
        $this->db = DatabaseConnection::getInstance();

        if($attributes !== null){
            $query = $this->db->prepare($sql);
            $query->execute($attributes);
            return $query;
        }else{
            return $this->db->query($sql);
        }
    }

    public function findAll()
    {
        $query = $this->makeQuery('SELECT * FROM '.$this->table);
        return $query->fetchAll();
    }

    public function findBy(array $criteria)
    {
        $fields = [];
        $values = [];


        foreach($criteria as $field => $value){
            $fields[] = "$field = ?";
            $values[]= $value;
        }

        $criteriaList = implode(' AND ', $fields);

        return $this->makeQuery('SELECT * FROM "' . $this->table . '" WHERE ' . $criteriaList, $values)->fetchAll();
    }

    public function findOne(int $id)
    {
        return $this->makeQuery("SELECT * FROM {$this->table} WHERE id = $id")->fetch();
    }

    public function persist(Entity $entity)
    {
        $fields = [];
        $inter = [];
        $values = [];

        foreach($entity as $field => $value){
            if($value !== null && $field != 'db' && $field != 'table'){
                $fields[] = $field;
                $inter[] = "?";
                $values[] = $value;
            }
        }

        $Formatedfields = implode(', ', $fields);
        $inters = implode(', ', $inter);

        return $this->makeQuery('INSERT INTO "' . $this->table .'" (' . $Formatedfields . ') VALUES(' . $inters . ')', $values)->fetch();
    }

    public function update(int $id, Entity $entity)
    {
        $fields = [];
        $values = [];

        foreach($entity as $field => $value){
            if($value !== null && $field != 'db' && $field != 'table'){
                $fields[] = "$field = ?";
                $values[] = $value;
            }
        }
        $values[] = $id;

        $Formattedfields = implode(', ', $fields);

        return $this->makeQuery('UPDATE ' . $this->table . ' SET ' . $Formattedfields . ' WHERE id = ?', $values);
    }

    public function delete(int $id){
        return $this->makeQuery("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

}