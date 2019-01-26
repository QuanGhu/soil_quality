<?php

namespace App\Helpers;

class CrudHelpers {

    public static function save($table, $data) 
    {
        return $table->create($data);
    }

    public static function delete($table, $field, $key)
    {
        return $table->where($field, $key)->delete();
    }

    public static function update($table, $field, $key, $data)
    {
        return $table->where($field, $key)->update($data);
    }
    
    public static function getAll($table, $name, $type)
    {
        return $table->orderBy($name, $type)->get();
    }

    public static function getWhere($table, $field, $key)
    {
        return $table->where($field, $key);
    }

    public static function base($table)
    {
        return $table;
    }

}