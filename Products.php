<?php
	// This code prevents page caching

		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1			
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 	// Date in the past	
		header("Pragma: no-cache");
		
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
		$strSQL1 = "SELECT PageID, Department, Category, Meta FROM PageDetails ORDER BY PageID";
		// Misspell one of the above fieldnames and see what error you get on your webpage.				
		
		// or  $strSQL = "SELECT * FROM Products WHERE Category = '$strCategory' ORDER BY ID";				
		// SELECT * is a bad lazy habit to get into.  If you have a large database with many fields,		
		// selecting all of them to save you typing impacts heavily on your server resources!				
		
			
		// For a better understanding of PHP string characteristics, see the StringsDemo.php page.
		
		

		// 3. Execute SQL to seed a "Products Record Set" variable										
		// As always, it is recommended to use relevent variable names.									
		$Prod_rs1 = mysql_query($strSQL1)
			or die(mysql_error());
			
	// End Of "Retrieve Desired Record Set"
	
	// "Retrieve Desired Record Set"

		// If you only plan on executing one SQL statement, you would put this at the top of the page.  
		// If you plan on multiple SQL queries, depending on logic, you could embed in the page. 		
		// In the case of this simple example, I would put this at the top of the page.					

		// Build the SQL query string... MAKE SURE to select all the Products fields that are needed	
		$strSQL2 = "SELECT ProductName, ProductCode, RegularPrice, ProductDescription, Option1, Option2, Option3, Option4, Category FROM Products ORDER BY ProductCode";
		// Misspell one of the above fieldnames and see what error you get on your webpage.				
		
		// or  $strSQL = "SELECT * FROM Products WHERE Category = '$strCategory' ORDER BY ID";				
		// SELECT * is a bad lazy habit to get into.  If you have a large database with many fields,		
		// selecting all of them to save you typing impacts heavily on your server resources!				
		
			
		// For a better understanding of PHP string characteristics, see the StringsDemo.php page.
		
		

		// 3. Execute SQL to seed a "Products Record Set" variable										
		// As always, it is recommended to use relevent variable names.									
		$Prod_rs2 = mysql_query($strSQL2)
			or die(mysql_error());
			
	// End Of "Retrieve Desired Record Set"
	
echo '<html>

  <head>';
  
	$PageID = empty($_GET['PageID'])? "" : $_GET['PageID'];
	$category;
	$department;
	$images;
	$option1;
	$option2;
	$option3;
	$id1;
	$id2;
	$id3;
	
	if ($PageID == null || $PageID < 100 || $PageID > 102 && $PageID < 200 || $PageID > 202 && $PageID < 300 || $PageID > 302)
	{
		$PageID = 300;
	}
	
	if ($PageID == 100 || $PageID == 101 || $PageID == 102)
	{
		$images = "PersonalGadgets";
		$department = "Personal Gadgets";
		$option1 = "Laptop Computers";
		$option2 = "Tablet Computers";
		$option3 = "Smart Phones";
		$id1 = 100;
		$id2 = 101;
		$id3 = 102;
	}
	else if ($PageID == 200 || $PageID == 201 || $PageID == 202)
	{
		$images = "PersonalEntertainment";
		$department = "Personal Entertainment";
		$option1 = "CDs";
		$option2 = "DVDs";
		$option3 = "Blu-ray Discs";
		$id1 = 200;
		$id2 = 201;
		$id3 = 202;
	}
	else if ($PageID == 300 || $PageID == 301 || $PageID == 302)
	{
		$images = "PersonalAccessories";
		$department = "Personal Accessories";
		$option1 = "Adapters";
		$option2 = "Headphones";
		$option3 = "Cables";
		$id1 = 300;
		$id2 = 301;
		$id3 = 302;
	}
	
	switch ($PageID)
	{
	case 100:
		$category = "Laptop Computers";
		break;
	case 101:
		$category = "Tablet Computers";
		break;
	case 102:
		$category = "Smartphones";
		break;
	case 200:
		$category = "Soundtracks";
		break;
	case 201:
		$category = "DVDs";
		break;
	case 202:
		$category = "Blu-ray Discs";
		break;
	case 300:
		$category = "Adapters";
		break;
	case 301:
		$category = "Headphones";
		break;
	case 302:
		$category = "Cables";
		break;
	default:
		$PageID = 300;
	}
	
		while ($Prod_row1 = mysql_fetch_array($Prod_rs1)) {
		
			if ( $Prod_row1["PageID"] == $PageID )
			{
				echo '<title>' . $Prod_row1["Category"] . ' : ' . $Prod_row1["Department"] . ' : Future Bound Enterprises</title>
				
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
				<meta name="description"  		content="' . $Prod_row1["Meta"] . '" />
				<meta name="author"       		content="Andrew Murray, andrew.murray1992@gmail.com" />
				<meta name="designer"       	content="JE Marriott, joe.marriott@nbcc.ca" />';
			}
		}
	
    echo '<link href="../Include/ProductPage.css" type="text/css" rel="stylesheet" />
		  <link rel="shortcut icon" href="../favicon.ico"> 
	
  
  	<script language="javascript" src="../Include/productsmenu.js" type="text/javascript"></script>
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
			<img src="../Images/shoppingcart.gif" height="18" width="127" border="0" align="ABSMIDDLE" />'; echo $_SESSION["contains"]; echo '</a>
		 </div>
		          
    </div>
    <!-- End of Header  -->
	
	
	<!-- Menu Bar -->
	<div id="MenuBar">
   
   		 <div id="MenuBarLeft">
            <a href="../Reg/SignIn.php" class="headerbar">'; echo $_SESSION["user"]; echo '</a>
		 </div>
        
		 <div id="MenuBarRight">
			<a href="../Reg/register.php" class="headerbar">'; echo $_SESSION["settings"]; echo '</a> 
            <a href="../Reg/SignIn.php" class="headerbar">| My Account</a> 
			<a href="../Cart/index.php" class="headerbar">'; echo $_SESSION["shopping"]; echo '</a> 
			<a href="../Cart/Checkout.php" class="headerbar">'; echo $_SESSION["check"]; echo '</a> 
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
					<option value="Products.php?PageID=' . $id1 . '">' . $option1 . '</option>
					<option value="Products.php?PageID=' . $id2 . '">' . $option2 . '</option>
					<option value="Products.php?PageID=' . $id3 . '">' . $option3 . '</option>
				</select>
             </form>
		 </div>
		
		 <div id="YouAreHereLinks">		 
		 	
			<a href="../index.php">Home</a> &raquo;
			<a href="Products.php?PageID=' . $id1 . '">' . $department . '</a> &raquo; &nbsp;
		 </div>
				         
	</div>	
	<!-- End of Search and "You Are Here" -->
	
	<!-- Main -->
	<div id="Main">';
	
	// "Display Individual Records"

	  // 4. Since in our example our SQL has probably returned more than one record,									
	  //    we need to loop through "Products Record Set" to grab each "product row" 									
	  
	  // 	"mysql_fetch_array(???)" is a function that reads a single record (row) from the provided ??? recordset.	
	  
	while ($Prod_row2 = mysql_fetch_array($Prod_rs2)) {
	
		//    Obviously, if you know your previous logic does not retrieve multiple records, you would not need to loop!	
		//	  Keep that in mind for future exercises.																		
		   
		   //  Note how the database content is displayed																
		   //  Note the image filename... now pulled from the database, and injected into an HTML statement				
			
			// Logic cannot be put inside an echo, so it is closed above.							
			// Now some further logic can be executed...												
			
			if ($Prod_row2["Category"] == $category) {
			// Display a product  
			echo '<div class="MainProduct">
				 <div class="MainProductImage">';
					// Note Product Code in 2 spots... internal label for linking to, and link for large image
					echo '<a name="' . $Prod_row2["ProductCode"] . '"></a> <a href=javascript:CaricaFoto("' . $images . '/Images/' . $Prod_row2["ProductCode"] . '.jpg")>';
					// Note Product Code in thumbnail
					echo '<img src="' . $images . '/Images/' . $Prod_row2["ProductCode"] . '_sm.jpg" border="0" height="75" width="100" /> </a>
				 </div>
				 <div class="MainProductText">';
					// Note Product Code in link for large image
					$quantity = 1;
					echo '<form action="../Cart/index.php?product=' . $Prod_row2["ProductCode"] . '&quantity=' . $quantity . '">
					<b><a href=javascript:CaricaFoto("' . $images . '/Images/' . $Prod_row2["ProductCode"] . '.jpg")>' . $Prod_row2["ProductName"] . '</a></b>
					<br /><font class="small">
					Product :: &nbsp; <input type="label" name="product" value="' . $Prod_row2["ProductCode"] . '" style="border: none; font-size:7pt" readonly>
					</font><br />
					<font class="price">$' . number_format($Prod_row2["RegularPrice"], 2, ".", ",") . '</font>
					<br />
					<p>' . $Prod_row2["ProductDescription"] . '</p>';
					// Display Options... currently dynamic, but with some provided code for inspiration. These changes are dynamic, and they are from the database.					
					if ( $Prod_row2["Option1"] != "" ) {
						echo '
							<br clear=all /><br /><ul><li>'
							. $Prod_row2["Option1"] . '</li>
						';
					}
					if ( $Prod_row2["Option2"] != "" ) {
						echo '
							<li>'
							. $Prod_row2["Option2"] . '</li>
						';
					}
					if ( $Prod_row2["Option3"] != "" ) {
						echo '
							<li>'
							. $Prod_row2["Option3"] . '</li>
						';
					}
					if ( $Prod_row2["Option4"] != "" ) {
						echo '
							<li>'
							. $Prod_row2["Option4"] . '</li></ul>
						';
					}
					// Note Product Code in URL parameter for shopping cart
					
					$strSQL3 = "SELECT ProductCode, Rating FROM Reviews WHERE ProductCode = '" . $Prod_row2["ProductCode"] . "'";
					// Misspell one of the above fieldnames and see what error you get on your webpage.				
					
					// or  $strSQL = "SELECT * FROM Products WHERE Category = '$strCategory' ORDER BY ID";				
					// SELECT * is a bad lazy habit to get into.  If you have a large database with many fields,		
					// selecting all of them to save you typing impacts heavily on your server resources!				
					
						
					// For a better understanding of PHP string characteristics, see the StringsDemo.php page.
					
					

					// 3. Execute SQL to seed a "Products Record Set" variable										
					// As always, it is recommended to use relevent variable names.									
					$Prod_rs3 = mysql_query($strSQL3)
						or die(mysql_error());
					
					$rating = 0;
					$total = 0;
					
					if ($_SESSION["user"] != "You are not signed in")
					{
					echo '<br /><br /><br />
					<div align="left">
					Overall Rating: ';
					
							while ($Prod_row3 = mysql_fetch_array($Prod_rs3)) {
							
								$rating += $Prod_row3["Rating"];
								$total += 1;
								$average = round( ($rating / $total) * 2 ) / 2;
								
								switch ($average)
								{
								case 1:
									echo '<img src="Images/stars_rating_01.gif" height=19 width=91 align=center>';
									break;
								case 1.5:
									echo '<img src="Images/stars_rating_01_5.gif" height=19 width=91 align=center>';
									break;
								case 2:
									echo '<img src="Images/stars_rating_02.gif" height=19 width=91 align=center>';
									break;
								case 2.5:
									echo '<img src="Images/stars_rating_02_5.gif" height=19 width=91 align=center>';
									break;
								case 3:
									echo '<img src="Images/stars_rating_03.gif" height=19 width=91 align=center>';
									break;
								case 3.5:
									echo '<img src="Images/stars_rating_03_5.gif" height=19 width=91 align=center>';
									break;
								case 4:
									echo '<img src="Images/stars_rating_04.gif" height=19 width=91 align=center>';
									break;
								case 4.5:
									echo '<img src="Images/stars_rating_04_5.gif" height=19 width=91 align=center>';
									break;
								case 5:
									echo '<img src="Images/stars_rating_05.gif" height=19 width=91 align=center>';
									break;
								default:
									echo '<img src="Images/stars_rating_00.gif" height=19 width=91 align=center>';
								}
							}
								echo '</div>
								
								<div align="right">
								Quantity: <input type="number" name="quantity" value="' . $quantity . '">
								</div>
								
								<div align="left">
								<a href=javascript:PopUp("Reviews.php?ProdID=' . $Prod_row2["ProductCode"] . '",1000,1000)>Write a review:</a>
								</div>
								
								<div align="right">
								<input type="image" name="submit" alt="Add to Cart" src="../Images/addtocart.gif" border="0" align="right" width="75" height="21"></form>
								</div>
								
								<div align="right">
								<br /><img src="../Images/shoppingcart.gif" height="18" width="127" border="0" align="right" />
								</div>';
							}
							else
							{
								echo '<br /><br /><br />
								<div align="left">
								Overall Rating: ';
								
							while ($Prod_row3 = mysql_fetch_array($Prod_rs3)) {
						
								$rating += $Prod_row3["Rating"];
								$total += 1;
								$average = round( ($rating / $total) * 2 ) / 2;
							
								switch ($average)
								{
								case 1:
									echo '<img src="Images/stars_rating_01.gif" height=19 width=91 align=center>';
									break;
								case 1.5:
									echo '<img src="Images/stars_rating_01_5.gif" height=19 width=91 align=center>';
									break;
								case 2:
									echo '<img src="Images/stars_rating_02.gif" height=19 width=91 align=center>';
									break;
								case 2.5:
									echo '<img src="Images/stars_rating_02_5.gif" height=19 width=91 align=center>';
									break;
								case 3:
									echo '<img src="Images/stars_rating_03.gif" height=19 width=91 align=center>';
									break;
								case 3.5:
									echo '<img src="Images/stars_rating_03_5.gif" height=19 width=91 align=center>';
									break;
								case 4:
									echo '<img src="Images/stars_rating_04.gif" height=19 width=91 align=center>';
									break;
								case 4.5:
									echo '<img src="Images/stars_rating_04_5.gif" height=19 width=91 align=center>';
									break;
								case 5:
									echo '<img src="Images/stars_rating_05.gif" height=19 width=91 align=center>';
									break;
								default:
									echo '<img src="Images/stars_rating_00.gif" height=19 width=91 align=center>';
								}
							}
								
								echo '</div>
								
								<div align="right">
								Quantity: <input type="number" name="quantity" value="' . $quantity . '">
								</div>
								
								<div align="left">
								<a href=javascript:PopUp("Reviews.php?ProdID=' . $Prod_row2["ProductCode"] . '",1000,1000)>Read all reviews:</a>
								</div>
								
								<div align="right">
								<input type="image" name="submit" alt="Add to Cart" src="../Images/addtocart.gif" border="0" align="right" width="75" height="21"></form>
								</div>
								
								<div align="right">
								<br /><img src="../Images/shoppingcart.gif" height="18" width="127" border="0" align="right" />
								</div>';
							}
					
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
					
						if ($Prod_row2["ProductCode"] == $_SESSION['cart'][$i]['name'])
						{
							echo '<br /><p align="right">contains ' . $_SESSION['cart'][$i]['qty'] . ' items for this product</p>';
						}
					}
					
					echo '<br clear="ALL" /><br /><br />
					 <p  align="right"><a href="#Top">Back to Top</a></p>
					 <hr width="80%" color="#3366cc" />
					 <br /><br />				 				 
				</div>
			</div>';
			// End of Display a product
		}
	} // End of the while		

	// End of "Display Individual Records"	
	
	
	include ('Include/Footer.php');
					
	echo '</div>
	<!-- End of Main -->
	
	
	<!-- Left Menu -->
	<div id="LeftMenu">	
		 <script language="javascript" type="text/javascript">create_menu("LeftMenu", LeftMenuLinks, LeftMenuProps);</script >	
	</div>
	<!-- End of Left Menu -->
	
	
	<!-- Left Ads -->';
	
		include ('Include/LeftAds.php');
		
	echo '<!-- End of Left Ads -->
	
	
  </body>
  
  
</html>';
?>