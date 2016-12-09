<?php
// This code prevents page caching

		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1			
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 	// Date in the past	
		header("Pragma: no-cache");
		
	// Normally, we would place our database connectivity code here.				
	// In the case of this 1-2-3 example, you will find it embedded in Step3 below.	
	
session_start();

/*
		4U2Do!... add database connectivity code here...
*/

if (empty($_SESSION["message"]))
{
	$_SESSION["user"] = "You are not signed in";
}

/*
 * 	INITIALIZE CART (only done first time here)
 *	The cart is actually just an array storing the product codes and cumulative quantities.
 *  We also have 2 variables to keep track of total number of items in the cart,
 *  and number of products.
 */

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();	//  create empty array
	$_SESSION['num_items'] = 0;
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
	Checkout Area : Future Bound Enterprises
	</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
    <meta name="description"  		content="Confirm your customer information and place your order!" />
    <meta name="author"       		content="Andrew Murray, andrew.murray1992@gmail.com" />
	<meta name="designer"       	content="JE Marriott, joe.marriott@nbcc.ca" />
	


	
    <link href="../Include/ProductPage.css" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="../favicon.ico"> 
	
  
  	<script language="javascript" src="../Include/menuitems.js" type="text/javascript"></script>
	<script language="javascript" src="../Include/menu.js" type="text/javascript"></script>
	<script language="javascript" src="../Include/caricafoto.js" type="text/javascript"></script>
	<script language="javascript" src="../Include/PopUp.js" type="text/javascript"></script>

	
		
	
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
				         
	</div>	
	<!-- End of Search and "You Are Here" -->
	
	<!-- Main -->
	<div id="Main">
	
<TABLE WIDTH="100%" HEIGHT="100%" BGCOLOR="#FFFFFF">
<CENTER>
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
		$strSQL = "SELECT ProductCode, ProductName, RegularPrice, Department, NumberInStock FROM Products ORDER BY ProductCode";
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

/*
 *	DISPLAY CART CONTENTS
 */

if (!isset($_GET['checkout'])) {

echo '<TR BGCOLOR="GREY"><TD>Product</TD><TD>Product ID</TD><TD>Quantity</TD><TD>Price</TD><TD>Total Price</TD></TR>';
$subtotal = 0;	

while ($Prod_row = mysql_fetch_array($Prod_rs)) {
	  
	//    Obviously, if you know your previous logic does not retrieve multiple records, you would not need to loop!	
	//	  Keep that in mind for future exercises.																		
		   
	//  Note how the database content is displayed																
	//  Note the image filename... now pulled from the database, and injected into an HTML statement				

	for ($i=0; $i<$_SESSION['num_products']; $i++) {
	
		if ($Prod_row["ProductCode"] == $_SESSION['cart'][$i]['name']) {
					
			// Logic cannot be put inside an echo, so it is closed above.							
			// Now some further logic can be executed...												
					
			// Since these items are stored in a database,
			// we only need to store the product code (primary key?) in the session.
			
			$images;
			$total = $Prod_row["RegularPrice"] * $_SESSION['cart'][$i]['qty'];
			$subtotal += $total;
			
			if ( $Prod_row["Department"] == "Personal Accessories" )
			{
				$images = "PersonalAccessories";
			}
			if ( $Prod_row["Department"] == "Personal Entertainment" )
			{
				$images = "PersonalEntertainment";
			}
			if ( $Prod_row["Department"] == "Personal Gadgets" )
			{
				$images = "PersonalGadgets";
			}
			
			echo '<TR><TD><FONT COLOR="BLUE">' . $Prod_row["ProductName"] . ' </FONT></TD>';
			
			echo '<TD>' . $_SESSION['cart'][$i]['name'] . '</TD><TD>' . $_SESSION['cart'][$i]['qty'];
			
			echo '</TD><TD>$' . $Prod_row["RegularPrice"] . '</TD><TD>$' . $total . '</TD></TR>';
			
			echo '<TR><TD COLSPAN="5"><br /></TD></TR>';
			
		}
	}
	/*
		4U2Do!... Do some database lookups and stuff to display product details...
	*/
}



/*
 *	CART FOOTER
 */
echo '<TR><TD COLSPAN="3" ALIGN="LEFT">';

if (isset($_COOKIE['EmailAddress']))
{
	echo 'Information regarding the status of your order will be sent to your e-mail address at ' . $_COOKIE['EmailAddress'];
}

echo '</TD><TD ALIGN="LEFT">Subtotal:</TD>';
echo '<TD ALIGN="LEFT">$' . $subtotal . '</TD></TR>';
	
	echo '<tr><td colspan="5" align="center">';
	echo '
	   <br clear="all" />Are you sure you want to check out? 
	   ( <a href="Checkout.php?checkout=1"> Yes </a> ) ( <a href="../index.php"> No </a> ) <br />
	   ';
	echo '</td></tr>';
	}
else {
	if (isset($_COOKIE['EmailAddress']))
	{
		// Check whether the item is already in the cart
		for ($i=0; $i<$_SESSION['num_products']; $i++)
		{
			mysql_query("INSERT INTO checkout (CustomerEmail, ProductCode, Quantity) 
								 VALUES ('" . $_COOKIE['EmailAddress'] . "', '" . $_SESSION['cart'][$i]['name'] . "', '" . $_SESSION['cart'][$i]['qty'] . "')");
		}
	}
	/*
	* CHECKOUT
	*/
	// unset variables
	unset($_SESSION['cart']);
	
	echo '<tr><td colspan="5" align="center">';
	echo '<br clear="all" />Checked out successfully.<br />';
	echo '</td></tr>';
	
	echo '<tr><td colspan="5" align="center">
	<a href="index.php">Back to Cart</a><br />
	</td></tr>';
}

?>
</CENTER>
</TABLE>

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