<?php

class Core_Model extends CI_Model
{
    protected $tableName = '';

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * This method returns all the records of a table.
     */
    public function getAll()
    {
        // select * from tableName Where active = 1
        return $this->db->get_where($this->tableName, array('active' => 1))->result();
    }

    // fetching all records
    public function getPageData($currentPage, $pageSize, $whereClause = '')
    {
        $query = '';
        $startFrom = $currentPage * $pageSize;
        if (empty($whereClause)) {
            $query = "select * from $this->tableName where active = 1 limit $startFrom,$pageSize";
        } else {
            $query = "select * from $this->tableName where $whereClause and active = 1 limit $startFrom,$pageSize";
        }
        $query = $this->db->query($query);

        return $query->result();
    }

    // fetch the records based on where clause with pagination support
    public function getPageDataWithCriteria($columnNameValueArr, $currentPage, $pageSize)
    {
        $startFrom = $currentPage * $pageSize;
        $query = $this->db->query("select * from $this->tableName where location like '%value%' active = 1 limit $startFrom,$pageSize");

        return $query->result();
    }

    /**
     * it accepts an associative array ("columnName"=> 'value1', "col2"=>'value 2').
     * retuns an array or stdClass objects (Every row is an object of stdClass).
     */
    public function getWhere($colNameValueArr)
    {
        $colNameValueArr['active'] = 1;
        // select * from tableName = $tableName where $colValueArr->key = $colValueArr->value;
        return $this->db->get_where($this->tableName, $colNameValueArr)->result();
    }

    /**
     * This method will return only one row (an object of stdClass).
     */
    public function getOne($colNameValueArr)
    {
        $colNameValueArr['active'] = 1;
        // return $this->db->get_where($this->tableName, $colNameValueArr)->row();

        return $this->db->get_where($this->tableName, $colNameValueArr)->row();
    }

    private function makeInClause($values)
    {
        $applyQuotes = function ($value) {
            return "'".$value."'";
        };

        // string passed function will be applied to every value of the array
        // array_map returns an array with all the transformed values
        // [a,b,c] --> ['a','b','c']
        $newArray = array_map($applyQuotes, $values);

        // ['a','b','c'] --> 'a','b','c'
        $newString = join(',', $newArray);
        $newString = '('.(empty($newString) ? "''" : $newString).')';

        return $newString;
    }

    public function getWhereIn($columnName, $values)
    {
        //select * from colleges where criteriaColumn like '%searchText%';
        $query = $this->db->query("select * from $this->tableName where active = 1 and $columnName in ".$this->makeInClause($values));

        return $query->result();
    }

    //UPDATE colleges SET name = 'azadd colegee', location='allahabaaddd' WHERE reg_no = 'ac947243'
    public function update($whereClause, $data)
    {
        // $this->load->database();
        foreach ($whereClause as $columnName => $columnValue) {
            $this->db->where($columnName, $columnValue);
        }

        $this->db->update($this->tableName, $data);
    }

    /**
     * This method accepts the values for a row (associative array )
     * array('columnName'=> value1,'columnName' => value2).
     */
    public function create($row)
    {
        // $this->load->database();
        $this->db->insert($this->tableName, $row);
    }

    //delete from tableName where column = value;

    public function delete($colNameValues)
    {
        foreach ($colNameValues as $colName => $colValue) {
            $this->db->where($colName, $colValue);
        }
        // $this->load->database();

        try {
            $this->db->update($this->tableName, array('active' => 0));
        } catch (Exeption $ex) {
            throw new UniqueConstraintException($this->db->_error_message());
        }
    }
}
