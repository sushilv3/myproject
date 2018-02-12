<?php

class Registration_Model extends Core_Model
{
    public function __Construct()
    {
        parent::__construct();
        // $this->tableName = 'kode_reg';
        $this->tableName = 'registration';
    }
}
