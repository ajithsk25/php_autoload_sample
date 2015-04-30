<?php 

/**
* @author Ajith S <ajith.sk25@gmail.com>
*/

namespace DataFaker;

class FakeDataInsert
{
    /**
    * Database connection variable
    */
    private $_dbConn;
    
    /**
    * Database connection variable
    */
    public $count;
    
    /**
    * Initialize the class variables 
    */
    public function __construct($dbConn)
    {
    	$this->_dbConn 	= $dbConn;	
    }
    
    /**
    * Inserts fake data based on the count
    */
    public function insertFakeData()
    {
        $insertSql      = "INSERT INTO tbl_sample_data (value_name, counter) VALUES "; // creating multiple insert query
    	for($i = 1; $i <= $this->count; $i++) {
            $insertSql  .= "('value_$i', $i),";
    	}
    	$insertSql      = trim($insertSql, ','); // trim comma
        if ($this->_dbConn->executeQuery($insertSql)) {
            echo "\n $this->count data are inserted.\n";
        } else {
            echo "\n Data cannot be inserted.\n";
        }
    }
}
