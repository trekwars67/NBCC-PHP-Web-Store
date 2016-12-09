<?php
// This code prevents page caching

		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1			
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 	// Date in the past	
		header("Pragma: no-cache");
		
	// Normally, we would place our database connectivity code here.				
	// In the case of this 1-2-3 example, you will find it embedded in Step3 below.	

// "Database Connectivity"

		// Normally, because you only have to connect once per page,
		// you would put this at the top of the page.				

		
		// Server													
		$db_server = "localhost";
	  
		// Database username (root is default)						
		$db_user = "root";
	  
		// Database password 										
		// Our database doesn't have a password						
		$db_passwd = "";
	  
		// Database name 											
		// In this example, it should be the one created for Lab 1	
		$db_name = "AndrewMurray";
		
		// 1. Create a connection to the local database				
		mysql_connect($db_server, $db_user, $db_passwd) 
			or die(mysql_error());

		// 2. Select the database for use							
		mysql_select_db($db_name) 
			or die(mysql_error());

	// End of "Database Connectivity"		
	
	// "Retrieve Desired Record Set"

		// If you only plan on executing one SQL statement, you would put this at the top of the page.  
		// If you plan on multiple SQL queries, depending on logic, you could embed in the page. 		
		// In the case of this simple example, I would put this at the top of the page.					

		// Build the SQL query string... MAKE SURE to select all the Products fields that are needed	
		$strSQL = "SELECT ProductCode, ProductDescription FROM Products ORDER BY ProductCode";
		// Misspell one of the above fieldnames and see what error you get on your webpage.				
		
		// or  $strSQL = "SELECT * FROM Products WHERE Category = '$strCategory' ORDER BY ID";				
		// SELECT * is a bad lazy habit to get into.  If you have a large database with many fields,		
		// selecting all of them to save you typing impacts heavily on your server resources!				
		
			
		// For a better understanding of PHP string characteristics, see the StringsDemo.php page.
		
		

		// 3. Execute SQL to seed a "Products Record Set" variable										
		// As always, it is recommended to use relevent variable names.									
		$Prod_rs = mysql_query($strSQL)
			or die(mysql_error());
			
	// End Of "Retrieve Desired Record Set"
	
	// "Display Individual Records"

	  // 4. Since in our example our SQL has probably returned more than one record,									
	  //    we need to loop through "Products Record Set" to grab each "product row" 									
	  
	  // 	"mysql_fetch_array(???)" is a function that reads a single record (row) from the provided ??? recordset.	

	// End of "Display Individual Records"	
	$ProdID = empty($_GET['ProdID'])? "" : $_GET['ProdID'];	
	
	while ($Prod_row = mysql_fetch_array($Prod_rs)) {
	  
	//    Obviously, if you know your previous logic does not retrieve multiple records, you would not need to loop!	
	//	  Keep that in mind for future exercises.																		
		   
	//  Note how the database content is displayed																
	//  Note the image filename... now pulled from the database, and injected into an HTML statement				
	
		if ($Prod_row["ProductCode"] == $ProdID) {
					
			// Logic cannot be put inside an echo, so it is closed above.							
			// Now some further logic can be executed...												
					
			// Since these items are stored in a database,
			// we only need to store the product code (primary key?) in the session.
			echo '<html><head><title>' . $Prod_row["ProductCode"] . '</title></head><body>';
			echo $Prod_row["ProductDescription"] . '</body></html>';
		}
	}
?>