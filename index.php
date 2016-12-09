<?php
session_start();

if (!isset($_SESSION["message"]))
{
	$_SESSION["user"] = "You are not signed in";
}

if (empty($_SESSION['num_items'])) 
{
	$_SESSION['num_items'] = 0;
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
      Home Page : Future Bound Enterprises
    </title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
    <meta name="description"  		content="This home page is our way of saying hello!" />
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
		
		 <div id="YouAreHereLinks">		 
			<a href="../index.php">Home</a>
		 </div>
				         
	</div>	
	<!-- End of Search and "You Are Here" -->
	
		
	<!-- Main -->
	<div id="Main">
	
		<div class="MainProduct">
			 <div class="MainProductText"> 

				<TABLE WIDTH="100%" HEIGHT="100%" BORDER="1">
				<TR>
				<TD ALIGN="CENTER" VALIGN="MIDDLE"> 
				<H1> <FONT COLOR="#000000">Home Page</FONT></H1>
				<H1> <FONT COLOR="#0000FF">Welcome to Future Bound Enterprises!</FONT></H1>
				<H3><FONT COLOR="#000000">Where your accessory, entertainment, and gadget needs couldn't be more easily met!</FONT></H3>
				<TABLE WIDTH="500" BORDER="1">
				<TR>
				<TD><img src="Images/50sCouple2.jpg" height="199" width="199" align="left" hspace="20" vspace="20">
				<B><FONT COLOR="#0000FF">At Future Bound Enterprise, our mission is to provide consumers and clients
				with the safest and most efficient online shopping experience that cannot be offered anywhere else!<BR>
				<BR>
				We have a variety of top-notch goods ranging from high-end PCs to acclaimed films on Blu-ray Disc!<BR>
				<BR>
				On behalf of my entire committed team, I cordially invite you to a whole new shopping experience!<BR>
				<BR><center><a href="/PersonalAccessories/index.php"><font color=black>May we recommend the Personal Adapters page?</font></a></center>
				</FONT></B></TD>
				</TR>
				</TABLE>
				</TD>
				</TR>
				</TABLE>
						
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