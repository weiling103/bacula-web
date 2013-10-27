<?php

/*
  +-------------------------------------------------------------------------+
  | Copyright 2010-2013, Davide Franco			                          |
  |                                                                         |
  | This program is free software; you can redistribute it and/or           |
  | modify it under the terms of the GNU General Public License             |
  | as published by the Free Software Foundation; either version 2          |
  | of the License, or (at your option) any later version.                  |
  |                                                                         |
  | This program is distributed in the hope that it will be useful,         |
  | but WITHOUT ANY WARRANTY; without even the implied warranty of          |
  | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           |
  | GNU General Public License for more details.                            |
  +-------------------------------------------------------------------------+
 */

class CDB {
    private static $connection;
    private $options;
    private $result;

	// ==================================================================================
	// Function: 	__construct()
	// Parameters: 	none
	// Return:		none
	// ==================================================================================
	
    private function __construct() {
    }

	// ==================================================================================
	// Function: 	connect()
	// Parameters: 	none
	// Return:		valid PDO connection
	// ==================================================================================
	
	public static function connect( $dsn, $user = null, $password = null, $options = array() ) {

		try {
            if ( is_null( self::$connection ) ) {
				self::$connection = new PDO($dsn, $user, $password);				
			}
        }catch (PDOException $e) {
            CErrorHandler::displayError($e);
        }
		
		return self::$connection;
    }

	// ==================================================================================
	// Function: 	getDriverName()
	// Parameters: 	none
	// Return:		driver name (eg: mysql, pgsql, sqlite, etc.)
	// ==================================================================================
	
    public static function getDriverName() {
		return self::$connection->getAttribute( PDO::ATTR_DRIVER_NAME );
    }

}
?>
