<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Inc/MySqlConfig.php');
	
class DB 
{
    var $_dbConn = 0;
    var $_queryResource = 0;
    
    function DB()
    {
        //do nothing
    }
    
    function connect_db($host, $user, $pwd, $dbname)
    {    
        $dbConn = mysql_connect($host, $user, $pwd);
        if (! $dbConn)
            die ("MySQL Connect Error");
        mysql_query("SET NAMES utf8");
        if (! mysql_select_db($dbname, $dbConn))
            die ("MySQL Select DB Error");
        $this->_dbConn = $dbConn;

        return true;
    }
    
    function close_db()
    {
        mysql_close($this->_dbConn);

        return true;
    }

    function query($sql)
    {
        if (! $queryResource = mysql_query($sql, $this->_dbConn))
            die ("MySQL Query Error! SQL: " . $sql);
        $this->_queryResource = $queryResource;
        return $queryResource;        
    }
    
    /** Get array return by MySQL */
    function fetch_array()
    {
        return mysql_fetch_array($this->_queryResource, MYSQL_ASSOC);
    }
    
    function get_num_rows()
    {
        return mysql_num_rows($this->_queryResource);
    }
    
    function get_fetch_row()
    {
    	return mysql_fetch_row($this->_queryResource);
    }    

    /** Get the cuurent id */    
    function get_insert_id()
    {
        return mysql_insert_id($this->_dbConn);
    } 
    
}
?>﻿