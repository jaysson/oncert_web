<?php

/**
 * Class Role
 */
class Role extends Zizaco\Entrust\EntrustRole {

    /***/
    public static function findByName($name)
    {
        return static::where('name', $name)->first();
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->name;
    }
}