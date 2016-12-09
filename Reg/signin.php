<?php
	
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Pragma: no-cache");
	
	// 1. Start a session
	session_start();
		   
	// The session_start() declaration needs to go at the top of a PHP document before any HTML is sent to the browser.  The reason for this:
	//		•	PHP Sessions create cookies
	//		•	Cookies need to be sent in the HTTP header
	//		•	The HTTP header is sent before the page document
	//		•	Since a PHP script is interpreted in sequence, if any HTML (or other text/markup) is written to the page document, it is then too late to commit any changes to the HTTP header
		
	if (empty($_SESSION["message"]))
	{
		$_SESSION["user"] = "You are not signed in";
	}
	
	if (empty($_SESSION['num_items'])) 
	{
		$_SESSION['num_items'] = 0;
	}
	
	$PageID = empty($_GET['PageID'])? "" : $_GET['PageID'];
	
	if ($PageID == 1)
	{
		unset($_SESSION["message"]);
		$_SESSION["user"] = "You are not signed in";
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
	Customer Sign-In Form
	</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
    <meta name="description"  		content="Use this form to sign in to your account!" />
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
                        <option value="signin.php" selected="selected">Sign in</option>
                  </select>
             </form>
		 </div>
		
		 <div id="YouAreHereLinks">		 
		 	
			<a href="../index.php">Home</a> &raquo;
		 </div>
				         
	</div>	
	<!-- End of Search and "You Are Here" -->
	
		
	<!-- Main -->
	<div id="Main">
	
		<div class="MainProduct">
			 <div class="MainProductText">
				<center>
					<?php
					
					$db_server = "localhost";
			
					$db_user = "root";
					
					$db_passwd = "";
					
					$db_name = "andrewmurray";
					
					mysql_connect($db_server, $db_user, $db_passwd) 
						or die(mysql_error());
						
					mysql_select_db($db_name) 
						or die(mysql_error());
						
					// "Retrieve Desired Record Set"

					// If you only plan on executing one SQL statement, you would put this at the top of the page.  
					// If you plan on multiple SQL queries, depending on logic, you could embed in the page. 		
					// In the case of this simple example, I would put this at the top of the page.					

					// Build the SQL query string... MAKE SURE to select all the Products fields that are needed	
					$strSQL1 = "SELECT EmailAddress, Password, FirstName, LastName FROM customer ORDER BY EmailAddress";
					// Misspell one of the above fieldnames and see what error you get on your webpage.				
					
					// or  $strSQL = "SELECT * FROM Products WHERE Category = '$strCategory' ORDER BY ID";				
					// SELECT * is a bad lazy habit to get into.  If you have a large database with many fields,		
					// selecting all of them to save you typing impacts heavily on your server resources!				
					
						
					// For a better understanding of PHP string characteristics, see the StringsDemo.php page.
					
					

					// 3. Execute SQL to seed a "Products Record Set" variable										
					// As always, it is recommended to use relevent variable names.									
					$Prod_rs1 = mysql_query($strSQL1)
						or die(mysql_error());
						
					$numRows = mysql_num_rows($Prod_rs1);
					$counter = 0;
					
						if (isset($_SESSION["message"]))
						{
							// Check if the session variable has already been registered
							echo 'You are already logged in.<br/>
							<a href="signin.php?PageID=1">Log out</a>';
						}
						else 
						{
							// Check that the login form was submitted
							if (isset($_POST["emailaddress"]))
							{
								while ($Prod_row1 = mysql_fetch_array($Prod_rs1))
								{
									$counter++;
									// check the username
									if ($_POST["emailaddress"] == $Prod_row1["EmailAddress"])
									{
										// Check the password
										// BUT we don't want to keep the password in plain text:
										// if ($_POST["password"] == "mnbvc") {
										
										// The sha1 hash will be what should be stored in the database
										if (sha1($_POST["password"]) == $Prod_row1["Password"])
										{
											//echo sha1($_POST['password']);
											$_SESSION["message"] = true;
											$_SESSION["user"] = $Prod_row1["FirstName"] . " " . $Prod_row1["LastName"];
											$_SESSION["email"] = $Prod_row1["EmailAddress"];
											Header("Location: http://localhost/index.php");
											break;
										}
										else
										{
											echo '<br /><br />Password failed.';
											echo '<br /><br /><a href="signin.php">Try again</a>';
											unset($_SESSION["message"]);
											unset($_SESSION["user"]);
											session_destroy();
										}
									}
									else if ($counter == $numRows)
									{
										echo 'E-mail address not registered.';
										echo '<br /><br /><a href="signin.php">Try again</a>';
										unset($_SESSION["message"]);
										unset($_SESSION["user"]);
										session_destroy();
									}
									else if ($_POST["emailaddress"] != $Prod_row1["EmailAddress"])
									{
										continue;
									}
								}
							}
							else
							{
								// Display login form
								echo '<form name="login_form" action="" method="POST">
										<label for="emailaddress">E-mail Address</label>
										<input type="text" name="emailaddress" id="emailaddress" /><br /><br />
										<label for="emailaddress">Enter Password</label>
										<input type="password" name="password" id="password" /><br /><br />
										<input type="submit" value="Login" />
									 </form>
									<a href="index.php">Need an account?</a><br /><br />';
							}
						}
					?>
				</center>
			</div>
	    </div>
		<br />
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