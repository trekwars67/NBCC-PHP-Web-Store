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
      TITLE MISSING
    </title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
    <meta name="description"  		content="DESC MISSING" />
    <meta name="author"       		content="YourName, YourEMail" />
	<meta name="designer"       	content="JE Marriott, joe.marriott@nbcc.ca" />
	


	
    <link href="../Include/ProductPage.css" type="text/css" rel="stylesheet" />
	
	
  
  	<script language="javascript" src="../Include/menuitems.js" type="text/javascript"></script>
	<script language="javascript" src="../Include/menu.js" type="text/javascript"></script>
	<script language="javascript" src="../Include/caricafoto.js" type="text/javascript"></script>
	
		
	
  </head>
  
  <body>
 
	<!-- Header -->
	<div id="Header">
	
  		 <div id="HeaderLeft">     
            <a href="../index.php"> <img height="30" alt="Home Page" src="../Images/logo.gif" width="135" border="0" align="left" /> </a>
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
                        <option value="index.php" selected="selected">Spanish - English</option>
                        <option value="FrenchEnglish.php">French - English</option>
                        <option value="GermanEnglish.php">German - English</option>
                  </select>
             </form>
		 </div>
		
		 <div id="YouAreHereLinks">		 
		 	
			<a href="../index.php">Home</a> &raquo; 
			<a href="index.php">Language Translators</a> &raquo; &nbsp;
            
		 </div>
				         
	</div>	
	<!-- End of Search and "You Are Here" -->
	
		
	<!-- Main -->
	<div id="Main">
		
		<!-- Display a product -->  
		<div class="MainProduct">
			 <div class="MainProductImage">
				<!-- Note Product Code in 2 spots... internal label for linking to, and link for large image -->
				<a name="BES1850"></a> <a href=javascript:CaricaFoto('Images/BES1850.jpg')>
				<!-- Note Product Code in thumbnail -->
				<img src="Images/BES1850_sm.jpg" border="0" height="93" width="100" /> </a>
			 </div>
			 <div class="MainProductText">
				<!-- Note Product Code in link for large image -->
				<b><a href=javascript:CaricaFoto('Images/BES1850.jpg')>Merriam-Webster&reg; ((Speaking)) Spanish-English Dictionary</a></b>
				<br />
				<font class="small">Product :: &nbsp; BES1850</font>
				<br />
				<font class="price">$119.95</font>
				<br />
				<p>Canada's #1 Selling Speaking Electronic Bilingual Dictionary provides you with instant access to 5,000,000 
					total translations to and from Spanish and English! Speaks words and phrases. Includes new Touch Panel technology with active keys for easy use.
                </p>
				<br /><br />
				<ul>
                    <li> Uses easy to find AAA batteries  </li>
                    <li> Available in 3 colors </li>
                    <li> Upgradable software! </li>
                </ul>
				<br />
				<!-- Note Product Code in URL parameter for shopping cart -->
				<a href="../Cart/index.php?product=BES1850&quantity=1">
				<img alt="Add to Cart" src="../Images/addtocart.gif" border="0" align="right" width="74" height="21" /> </a>
				<br clear="ALL" /><br /><br />
				 <p  align="right"><a href="#Top">Back to Top</a></p>
                 <hr width="80%" color="#3366cc" />
                 <br /><br />				 				 
			</div>
	    </div>
		<!-- End of Display a product --> 
		
		<!-- Display a product -->  
		<div class="MainProduct">
			 <div class="MainProductImage">
				<!-- Note Product Code in 2 spots... internal label for linking to, and link for large image -->
				<a name="DBE1450"></a> <a href=javascript:CaricaFoto('Images/DBE1450.jpg')>
				<!-- Note Product Code in thumbnail -->
				<img  src="Images/DBE1450_sm.jpg" border="0" height="100" width="100" /> </a>
			 </div>
			 <div class="MainProductText">
				<!-- Note Product Code in link for large image -->
				<b><a href=javascript:CaricaFoto('Images/DBE1450.jpg')>Merriam-Webster&reg; Spanish-English Dictionary</a></b>
				<br />
				<font class="small">Product :: &nbsp; DBE1450</font>
				<br />
				<font class="price">$59.95</font>
				<br />
				<p>Merriam-Webster&reg; Spanish-English Dictionary, Canada's #1 Selling Electronic Bilingual Dictionary, provides you with instant access to 5,000,000 total translations to
                           and from Spanish and English! Includes new Touch Panel technology with active keys for easy use.
                </p>
				<br /><br />
				<ul>
                           <li>Uses easy to find AAA batteries</li>
                           <li>Available in 3 colors</li>
                </ul>
				<br />
				<!-- Note Product Code in URL parameter for shopping cart -->
				<a href="../Cart/index.php?product=DBE1450&quantity=1">
				<img alt="Add to Cart" src="../Images/addtocart.gif" border="0" align="right" width="74" height="21" /> </a>
				<br clear="ALL" /><br /><br />
				 <p  align="right"><a href="#Top">Back to Top</a></p>
                 <hr width="80%" color="#3366cc" />
                 <br /><br />	
			</div>
	    </div>
		<!-- End of Display a product --> 
				   
			
		<!-- Display a product -->  
		<div class="MainProduct">
			 <div class="MainProductImage">
				<!-- Note Product Code in 2 spots... internal label for linking to, and link for large image -->
				<a name="ET6640"></a> <a href=javascript:CaricaFoto('Images/ET6640.jpg')>
				<!-- Note Product Code in thumbnail -->
				<img  src="Images/ET6640_sm.jpg" border="0" height="100" width="100" /></a>
			 </div>
			 <div class="MainProductText">
				<!-- Note Product Code in link for large image -->
				<b><a href=javascript:CaricaFoto('Images/ET6640.jpg')>Spanish - English Dictionary with Interactive Teaching System</a></b>
				<br />
				<font class="small">Product :: &nbsp; ET6640</font>
				<br />
				<font class="price">$49.95</font>
				<br />
				<p>SEIKO's premier Spanish-English language tool, the ET6640 includes a comprehensive reference library which includes a bilingual translation dictionary, with over 4.5
                           million translations, an inflections mode, SAT & TOEFL Dictionaries and customizable User Word lists. A complete language resource, the unit shows all accent marks,
                           parts of speech, and masculine/feminine forms. The ET6640 is a valuable educational aid.
                </p>
				<br /><br />
				<ul>
                           <li>Uses easy to find AAA batteries</li>
                           <li>Available in 2 colors</li>
                </ul>
				<br />
				<!-- Note Product Code in URL parameter for shopping cart -->
				<a href="../Cart/index.php?product=ET6640&quantity=1">
				<img alt="Add to Cart" src="../Images/addtocart.gif" border="0" align="right" width="74" height="21" /> </a>
				<br clear="ALL" /><br /><br />
				 <p  align="right"><a href="#Top">Back to Top</a></p>
                 <hr width="80%" color="#3366cc" />
                 <br /><br />	
			</div>
	    </div>
		<!-- End of Display a product -->	   
			
		<!-- Footer -->
		<div id="Footer">
			 <div id="FooterTop">
				
				   		   <a class="footer" href="../index.php">Home |</a>
				   		   <a class="footer" href="../Reg/index.php">Register |</a> 
				   		   <a class="footer" href="../Reg/SignIn.php">My Account |</a> 
				   		   <a class="footer" href="../ContactUs.php">Contact Us</a>
				  
			 </div>
			 <div id="FooterBottom">
			 	 
			 	  		  <a class="footer" href="../Copyright.php">COPYRIGHT</a> 
				  		  <font class="small">&copy; 2012 "Replace with Your Company Name", All Rights Reserved.</font><br />
        		  		  <font class="small">This page was last modified :: 
						  
						  <?php	print( date("D F d , Y", getlastmod() )); ?>
						  
						  </font>
				 
			</div>
		</div>
		<!-- End of Footer -->	
		 
					
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

