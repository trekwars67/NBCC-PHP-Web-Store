<?php
session_start();

if (empty($_SESSION["message"]))
{
	$_SESSION["user"] = "You are not signed in";
}

if (empty($_SESSION['num_items'])) 
{
	$_SESSION['num_items'] = 0;
}
?>

<html>

  <head>
  
    <title>
      Contact Us : Future Bound Enterprises
    </title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
    <meta name="description"  		content="If you have any questions, don't hesitate to contact us!" />
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
			<img src="../Images/shoppingcart.gif" height="18" width="127" border="0" align="ABSMIDDLE" />Contains <?php echo $_SESSION['num_items']; ?> Items</a>
		 </div>
		          
    </div>
    <!-- End of Header  -->
	
	
	<!-- Menu Bar -->
	<div id="MenuBar">
   
   		 <div id="MenuBarLeft">
            <a href="../Reg/SignIn.php" class="headerbar"><?php echo $_SESSION["user"]; ?></a>
		 </div>
        
		 <div id="MenuBarRight">
            <a href="../Reg/SignIn.php" class="headerbar">| My Account</a> 
			<a href="../Cart/index.php" class="headerbar">| My Cart</a> 
			<a href="../Cart/Checkout.php" class="headerbar">| Checkout</a> 
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
                        <option value="ContactUs.php" selected="selected">Contact Us</option>
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
				<table>
				<tr><td>
				Phone Numbers - 
				</td><td>
				Day Number: 1-506-455-9510
				</td></tr>
				<tr><td></br>
				</td><td>Night Number: 1-506-261-5207</td></tr>
				<tr><td></br></td></tr>
				<tr><td>
				Fax Numbers - 
				</td><td>
				Day Number: 1-506-451-6069
				</td></tr>
				<tr><td></br>
				</td><td>Night Number: 1-506-461-6758</td></tr>
				<tr><td></br></td></tr>
				<tr><td>
				Street Address:
				</td><td>
				123 Sutton Street
				</td></tr>
				<tr><td></br>
				</td><td>Fredericton, NB</td></tr>
				<tr><td></br>
				</td><td>E3B-6L4</td></tr>
				<tr><td></br></td></tr>
				<tr><td>
				E-mail Address:
				</td><td>
				<a href="mailto:andrew.murray1992@gmail.com">andrew.murray1992@gmail.com</a>
				</td></tr>
				</table>
				</center>
			</div>
	    </div>
			
		<?php include ('Include/Footer.php'); ?>
					
	</div>
	<!-- End of Main -->
	
	
	
	<!-- Left Menu -->
	<div id="LeftMenu">	
		 <script language="javascript" type="text/javascript">create_menu('LeftMenu', LeftMenuLinks, LeftMenuProps);</script >	
	</div>
	<!-- End of Left Menu -->
	
	
	
	<!-- Left Ads -->
	
		<?php include ('Include/LeftAds.php'); ?>
		
	<!-- End of Left Ads -->
	
	
  </body>
  
	
</html>

