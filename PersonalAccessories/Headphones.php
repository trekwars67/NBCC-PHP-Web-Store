<?php
	// This code prevents page caching

		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1			
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 	// Date in the past	
		header("Pragma: no-cache");
		
	// Normally, we would place our database connectivity code here.				
	// In the case of this 1-2-3 example, you will find it embedded in Step3 below.	
	
	session_start();

	if (empty($_SESSION["message"]))
	{
		$_SESSION["user"] = "You are not signed in";
	}
	
	if (empty($_SESSION['num_items'])) 
	{
		$_SESSION['num_items'] = 0;
	}
	
	if (!isset($_SESSION['cart']))
	{
		$_SESSION['cart'] = array();	//  create empty array
		$_SESSION['num_products'] = 0;
	}
	
	if ($_SESSION["user"] == "You are not signed in")
	{
		$_SESSION["settings"] = "";
		$_SESSION["shopping"] = "";
		$_SESSION["check"] = "";
		$_SESSION["contains"] = "";
	}
	else
	{
		$_SESSION["settings"] = " | Account Settings ";
		$_SESSION["shopping"] = " | My Cart ";
		$_SESSION["check"] = " | Checkout ";
		$_SESSION["contains"] = " Contains " . $_SESSION['num_items'] . " Items ";
	}
	?>

<html>

  <head>
  
    <title>
      Headphones : Personal Accessories : Future Bound Enterprises
    </title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
    <meta name="description"  		content="Shop around for trusty headphones on this page!" />
    <meta name="author"       		content="Andrew Murray, andrew.murray1992@gmail.com" />
	<meta name="designer"       	content="JE Marriott, joe.marriott@nbcc.ca" />
	


	
    <link href="../Include/ProductPage.css" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="../favicon.ico"> 
	
  
  	<script language="javascript" src="../Include/menuitems.js" type="text/javascript"></script>
	<script language="javascript" src="../Include/menu.js" type="text/javascript"></script>
	<script language="javascript" src="../Include/caricafoto.js" type="text/javascript"></script>
	
		
	
  </head>
  
  <body>
 
	<!-- Header -->
	<div id="Header">
	
  		 <div id="HeaderLeft">     
            <a href="../index.php"> <img height="35" alt="Home Page" src="../Images/Nuke.jpg" width="135" border="0" align="left" /> </a>
		 </div>
		 
		 <div id="HeaderRight">         
            <a href="../Cart/index.php" class="header">
			<img src="../Images/shoppingcart.gif" height="18" width="127" border="0" align="ABSMIDDLE" /><?php echo $_SESSION["contains"]; ?></a>
		 </div>
		          
    </div>
    <!-- End of Header  -->
	
	
	<!-- Menu Bar -->
	<div id="MenuBar">
   
   		 <div id="MenuBarLeft">
            <a href="../Reg/SignIn.php" class="headerbar"><?php echo $_SESSION["user"]; ?></a>
		 </div>
        
		 <div id="MenuBarRight">
			<a href="../Reg/register.php" class="headerbar"><?php echo $_SESSION["settings"]; ?></a> 
            <a href="../Reg/SignIn.php" class="headerbar">| My Account</a> 
			<a href="../Cart/index.php" class="headerbar"><?php echo $_SESSION["shopping"]; ?></a> 
			<a href="../Cart/Checkout.php" class="headerbar"><?php echo $_SESSION["check"]; ?></a> 
			<a class="headerbar" href="../ContactUs.php">| Contact Us</a>
		</div>
         
	</div>
    <!-- End of Menu Bar -->
	
	
	<!-- Search and "You Are Here" -->
	<div id="Search"> 
   
   		 <div id="SearchLeft">
            <form action="../search/index.php" method="get">
				  <input type="text" name="txtsearch" value="Search" size="15" />
				  <input type="image" src="../images/go.gif" border="0" width="26" height="21"  align="middle" /> 
			</form>
		 </div>
        
		 <div id="YouAreHereList">		 	
			 <form action="">
                  <select onchange="document.location=this.value" name="CatId">
                        <option value="index.php">Adapters</option>
                        <option value="Headphones.php" selected="selected">Headphones</option>
                        <option value="Cables.php">Cables</option>
                  </select>
             </form>
		 </div>
		
		 <div id="YouAreHereLinks">		 
		 	
			<a href="../index.php">Home</a> &raquo; 
			<a href="index.php">Personal Accessories</a> &raquo; &nbsp;
            
		 </div>
				         
	</div>	
	<!-- End of Search and "You Are Here" -->
	
	<!-- Main -->
	<div id="Main">
	
<?php
	
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
		$strSQL = "SELECT ProductName, ProductCode, RegularPrice, ProductDescription, Option1, Option2, Option3, Option4, Category FROM Products ORDER BY ProductCode";
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
	  
	while ($Prod_row = mysql_fetch_array($Prod_rs)) {
	  
		//    Obviously, if you know your previous logic does not retrieve multiple records, you would not need to loop!	
		//	  Keep that in mind for future exercises.																		
		   
		   //  Note how the database content is displayed																
		   //  Note the image filename... now pulled from the database, and injected into an HTML statement				
			
		if ($Prod_row["Category"] == "Headphones") {
			
			// Logic cannot be put inside an echo, so it is closed above.							
			// Now some further logic can be executed...												
		
		// Display a product  
		echo '<div class="MainProduct">
			 <div class="MainProductImage">';
				// Note Product Code in 2 spots... internal label for linking to, and link for large image
				echo '<a name="' . $Prod_row["ProductCode"] . '"></a> <a href=javascript:CaricaFoto("Images/' . $Prod_row["ProductCode"] . '.jpg")>';
				// Note Product Code in thumbnail
				echo '<img src="Images/' . $Prod_row["ProductCode"] . '_sm.jpg" border="0" height="75" width="100" /> </a>
			 </div>
			 <div class="MainProductText">';
				// Note Product Code in link for large image
				$quantity = 1;
					echo '<form action="../Cart/index.php?product=' . $Prod_row["ProductCode"] . '&quantity=' . $quantity . '">
					<b><a href=javascript:CaricaFoto("Images/' . $Prod_row["ProductCode"] . '.jpg")>' . $Prod_row["ProductName"] . '</a></b>
					<br /><font class="small">
					Product :: &nbsp; <input type="label" name="product" value="' . $Prod_row["ProductCode"] . '" style="border: none; font-size:7pt" readonly>
					</font><br />
				<font class="price">$' . number_format($Prod_row["RegularPrice"], 2, ".", ",") . '</font>
				<br />
				<p>' . $Prod_row["ProductDescription"] . '</p>';
				// Display Options... currently dynamic, but with some provided code for inspiration. These changes are dynamic, and they are from the database.					
				if ( $Prod_row["Option1"] != "" ) {
					echo '
						<br clear=all /><br /><ul><li>'
						. $Prod_row["Option1"] . '</li>
					';
				}
				if ( $Prod_row["Option2"] != "" ) {
					echo '
						<li>'
						. $Prod_row["Option2"] . '</li>
					';
				}
				if ( $Prod_row["Option3"] != "" ) {
					echo '
						<li>'
						. $Prod_row["Option3"] . '</li>
					';
				}
				if ( $Prod_row["Option4"] != "" ) {
					echo '
						<li>'
						. $Prod_row["Option4"] . '</li></ul>
					';
				}
				// Note Product Code in URL parameter for shopping cart
				echo '<br /><br /><br />
					<p align="right">
					Quantity: <input type="number" name="quantity" value="' . $quantity . '">
					<input type="image" name="submit" alt="Add to Cart" src="../Images/addtocart.gif" border="0" align="right" width="75" height="21">
					</form></p>
					<br /><img src="../Images/shoppingcart.gif" height="18" width="127" border="0" align="right" />';
					
					for ($i=0; $i<$_SESSION['num_products']; $i++)
					{
						if (empty($_SESSION['cart'][$i]['name'])) 
						{
							$_SESSION['cart'][$i]['name'] = "";
						}
		
						if (empty($_SESSION['cart'][$i]['qty'])) 
						{
							$_SESSION['cart'][$i]['qty'] = 0;
						}
					
						if ($Prod_row["ProductCode"] == $_SESSION['cart'][$i]['name'])
						{
							echo '<br /><p align="right">has ' . $_SESSION['cart'][$i]['qty'] . ' items for this product.</p>';
						}
					}
					
					echo '
				<br clear="ALL" /><br /><br />
				 <p  align="right"><a href="#Top">Back to Top</a></p>
                 <hr width="80%" color="#3366cc" />
                 <br /><br />				 				 
			</div>
	    </div>';
		// End of Display a product
		
		}
	} // End of the while		

	// End of "Display Individual Records"	
	?>
	
	<?php include ('../Include/Footer.php'); ?>
					
	</div>
	<!-- End of Main -->
	
	
	<!-- Left Menu -->
	<div id="LeftMenu">	
		 <script language="javascript" type="text/javascript">create_menu('LeftMenu', LeftMenuLinks, LeftMenuProps);</script >	
	</div>
	<!-- End of Left Menu -->
	
	
	
	<!-- Left Ads -->
	
		<?php include ('../Include/LeftAds.php'); ?>
		
	<!-- End of Left Ads -->
	
	
  </body>
  
	
</html>