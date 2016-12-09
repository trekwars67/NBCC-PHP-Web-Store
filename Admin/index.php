<?php
session_start();

if (isset($_SESSION["user"]))
{
	if ( $_SESSION["user"] != "Admin istration" )
	{
		echo "Ah, ah, ah! You didn't say the magic word!";
	}
	else
	{
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
				$strSQL1 = "SELECT Department, Category FROM PageDetails ORDER BY PageID";
				// Misspell one of the above fieldnames and see what error you get on your webpage.				
				
				// or  $strSQL = "SELECT * FROM Products WHERE Category = '$strCategory' ORDER BY ID";				
				// SELECT * is a bad lazy habit to get into.  If you have a large database with many fields,		
				// selecting all of them to save you typing impacts heavily on your server resources!				
				
					
				// For a better understanding of PHP string characteristics, see the StringsDemo.php page.
				
				

				// 3. Execute SQL to seed a "Products Record Set" variable										
				// As always, it is recommended to use relevent variable names.									
				$Prod_rs1 = mysql_query($strSQL1)
					or die(mysql_error());

		// Code to create and save a ( 100 x ?height? ) thumbnail from a user uploaded image.													
		// This page links back to itself.  Be aware of that when making a copy.														     	

		// This page makes extensive use of the GD Graphics Library.  Ensure that it is enabled in your WAMP configuration.						
		// For more about GD, visit http://www.boutell.com/gd/ or http://php.net/manual/en/book.image.php										

		// When a file is uploaded to the server, it is stored in a temporary location (see ['tmp_name'] from the DEBUG output on your screen). 
		// If the file is not copied to another location, it is deleted from the server and no longer accessible. 								

		// The 'if' below is not executed the first time the page is called.																	
		// If you're reading this page for the first time, skip down to the HTML below to start the process.									
		// Once you enter a filename into the form and press the 'Upload File' button, this page links back to itself.							
		// Then, this 'if' is executed.										 																	

		 

		if ( isset($_FILES["uploadedfile"]) ) {
			
			// Note the appearance of this message, showing you when this block of code is executed.
			// It is included for debug purposes only.												
			echo 'I detect you are attempting to upload a Product.  Here are the results...<br/><br/>';

			// I'm just proving other form controls come along with the uploaded file.			
			echo ( isset($_POST['txtProdID']) ? 'Product ID : ' . $_POST['txtProdID'] . '<br>' : " " );
			
			// Where our fullsized image is going (in this case, the Demos Images directory).	
			// Try $target_path = "../LanguageTrans/Images/"; 									
				$target_path = "../" . $_POST['txtProdID'] . "/Images/";
						
				// Where our thumbnail is going (in this case, the Demos Images directory).			
				// Try $thumbnail_path = "../LanguageTrans/Images/";							 	
				$thumbnail_path = "../" . $_POST['txtProdID'] . "/Images/";
					
			// The name of our file, extracted from the original filename of the image you uploaded.   	
			// If you want to call it anything else, this is the place to do it!						
			if ( basename($_FILES["uploadedfile"]["name"]) != $_POST['txtProdID'] )
			{
				$filename = $_POST['txtProdID'];
			}
			else
			{
				$filename = basename($_FILES["uploadedfile"]["name"]);
			}
			
			// Try to upload the file.			
			if( move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $target_path . $filename) ) {
				echo 'File uploaded successfully.<br />';
				
				// Check filetype to determine if uploaded file is an image.							
				// The site we have been developing only uses JPEGS (if you're been following specs).	
				// The PNG code is provided for your information only.									
				$acceptable_filetypes = array(".jpeg", ".jpg", ".png");
				$filetype = strtolower( substr($filename, strrpos($filename, ".")) );		
				if ( in_array($filetype, $acceptable_filetypes) ) {			
					// Try to create the thumbnail by calling the function provided below.		
					if ( CreateThumbnail($thumbnail_path , $target_path . $filename , $filetype) ) {
						echo 'Thumbnail created successfully.<br />';
					} 
					else {
						echo 'There was an error creating the thumbnail.<br />';
					}
				} 
				else {
					echo 'File must be jpeg, jpg, or png to create a thumbnail.<br />';
				}
				
			} 
			else {
				echo 'There was an error uploading the file.<br />';
			}
		}

		?>




		<?php
		// This function is only executed by the logic above.  The PHP engine does not "automatically" drop into it.


		function CreateThumbnail($thumb_dir, $file, $filetype, $thumb_width = 100, $thumb_height = 6000 ) {
		// Incoming parameters : 	Thumbnail Directory Path														
		//							Name of fullsize image															
		//							Type of image ( .jpg, .jpeg, .png )												
		//							Desired thumbnail width (defaults to maximum 100 if nothing is passed)			
		//							Desired thumbnail height (defaults to maximum 6000 if nothing is passed)		
		//
		// Responsibilities :		Creates a thumbnail of size 100x? in format FullsizeName_sm.??? , 				
		//							where ??? is the original extension , and places into the specified directory	
		//
		// Return Value :			TRUE if thumbnail sucessfully created, FALSE otherwise.							


			// Create image handle using GD functions.																		
			// ImageCreateFromPNG() returns an image identifier representing the image obtained from the given filename. 	
			// Ref http://ca.php.net/manual/en/function.imagecreatefrompng.php												
			// ImageCreateFromJPEG() returns an image identifier representing the image obtained from the given filename.	
			// Ref http://ca.php.net/manual/en/function.imagecreatefromjpeg.php												
			if( $filetype == ".png" ) {
				$base_img = ImageCreateFromPNG($file);
			}
			else if( ($filetype == ".jpeg") || ($filetype == ".jpg") ) {
				$base_img = ImageCreateFromJPEG($file);
			} 

			// If the image is broken, cancel the operation.								
			if ( !$base_img ) return false;

			// Get image sizes (width/height) from the image object we just created.		
			$img_width = imagesx($base_img);
			$img_height = imagesy($base_img);


			//  Resize the image, maintaining aspect ratio.																	
			
			//	Question - What's the ideal percentage to get to our preferred thumbnail width or height? 					
			//																												
			//  Because we want thumbnails of width 100, we forced the situation											
			//  by making $thumb_height ridiculously large above (6000).  For most circumstances, your thumbnails should	
			//  generate at 100 wide.   If you encounter odd situations which do not work, you may want to resize			
			//  the fullsized image before using this.																		
			$img_width_per  = $thumb_width / $img_width;
			$img_height_per = $thumb_height / $img_height;	

			if ($img_width_per <= $img_height_per)  {
				// Resize per the desired width (100) , and the appropriate height.									
				$thumb_width = $thumb_width;
				$thumb_height = intval($img_height * $img_width_per);
			}
			else {
				// Resize per the desired height.  This code should not be executed, but has been provided FYI.		
				$thumb_width = intval($img_width * $img_height_per);
				$thumb_height = $thumb_height;
			}

			// Create a new true color image using GD function.														
			// ImageCreateTrueColor() returns an image identifier representing a black image of the specified size. 
			// Ref http://php.net/manual/en/function.imagecreatetruecolor.php										
			$thumb_img = ImageCreateTrueColor($thumb_width, $thumb_height);

			// Copy our original image into our new thumbnail-sized image using GD function.						
			// ImageCopyResampled() copies a rectangular portion of one image to another image, smoothly 			
			// interpolating pixel values so that, in particular, reducing the size of an image still retains		
			// a great deal of clarity.																				
			// Ref http://ca.php.net/manual/en/function.imagecopyresampled.php										
			ImageCopyResampled($thumb_img, $base_img, 0, 0, 0, 0, $thumb_width, $thumb_height, $img_width, $img_height);

			// Put the newly created thumbnail in the specified directory from the incoming parameter list.			
			// The site we have been developing only uses JPEGS (if you're been following specs).	
			// The PNG code is provided for your information only.									
			if ( $filetype == ".png" )   {
				// Inject "_sm" into the filename to adhere to our thumbnail naming convention.						
				// str_replace() replaces all occurrences of the search string with the replacement string,			
				// and returns the newly constructed string.														
				// Ref http://php.net/manual/en/function.str-replace.php											
				// We're saying " in the filename xyz.png, replace '.png' with '_sm.png' , resulting in xyz_sm.png "
				$tmb = "_sm";	
				$ext = ".png";
				$file = str_replace($ext , $tmb.$ext , $file);
				
				// ImagePNG() - Output a PNG image to either the browser or a file.									
				// Ref http://php.net/manual/en/function.imagepng.php												
				ImagePNG($thumb_img, $thumb_dir . basename($file));
			}
			else if ( ($filetype == ".jpeg") || ($filetype == ".jpg") )   {        
				// Inject "_sm" into the filename to adhere to our thumbnail naming convention.						
				// See above for further explanation.																
				$tmb = "_sm";
				$ext = ($filetype==".jpg")? ".jpg" : ".jpeg";
				$file = str_replace($ext , $tmb.$ext , $file);
					
				// ImageJPEG() - Output a JPEG image to either the browser or a file.								
				// Ref http://php.net/manual/en/function.imagejpeg.php												
				ImageJPEG($thumb_img, $thumb_dir . basename($file));		
			}
			
			// And a little housekeeping...																			
			// ImageDestroy() frees any memory associated with image.												
			// Ref http://php.net/manual/en/function.imagedestroy.php												
			ImageDestroy($base_img);
			ImageDestroy($thumb_img);

			return true;
		}

		// function CreateThumbnail() ends here.																	

					





		echo '<html>
		<head>
			<title>Upload Product</title>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
			<meta name="description"  		content="This home page is our way of saying hello!" />
			<meta name="author"       		content="Andrew Murray, andrew.murray1992@gmail.com" />
			<meta name="designer"       	content="JE Marriott, joe.marriott@nbcc.ca" />
			


			
			<link href="../Include/ProductPage.css" type="text/css" rel="stylesheet" />
			<link rel="shortcut icon" href="../favicon.ico"> 
			
		  
			<script language="javascript" src="../Include/menuitems.js" type="text/javascript"></script>
			<script language="javascript" src="../Include/menu.js" type="text/javascript"></script>
			<script language="javascript" src="../Include/caricafoto.js" type="text/javascript"></script>
			<script language="JavaScript">
			
			var store = new Array();';
			echo 'function setDeptCatOptions() {
						var DeptChosen = document.frmDeptCat.optDept.options[document.frmDeptCat.optDept.selectedIndex].value;
						var catbox = document.frmDeptCat.optCat;
		 
					 catbox.options.length = 0;
					 
					 switch (DeptChosen) {
					 
							default  :
							case " " :
								 catbox.options[catbox.options.length] = new Option("--Category--"," ");
								 break;';
							$counter = 0;
							$rs2=mysql_query("Select Department, Category from pagedetails");
							while ($row2 = mysql_fetch_array($rs2)) {
							
							if ($row2["Department"] == "Personal Accessories")
							{
							echo 'case "Personal Accessories" : 
catbox.options[catbox.options.length] = new Option("' . $row2["Category"] . '",
"Personal Accessories,store[DeptChosen][0]");
								 ';
							}
							if ($row2["Department"] == "Personal Entertainment")
							{
							echo 'case "Personal Entertainment" : 
catbox.options[catbox.options.length] = new Option("' . $row2["Category"] . '",
"Personal Entertainment,store[DeptChosen][0]");
								 ';
							}
							if ($row2["Department"] == "Personal Gadgets")
							{
							echo 'case "Personal Gadgets" : 
catbox.options[catbox.options.length] = new Option("' . $row2["Category"] . '",
"Personal Gadgets,store[DeptChosen][0]");
								 ';
							}
							
							}
				echo '}
			}
			
		</script>
		</head>';
		?>

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
			
		<hr/>
		<!-- A simple form to enter an image to upload 																								-->
		<!--																																		-->
		<!-- •	enctype="multipart/form-data" - Used for submitting forms that contain files, non-ASCII data, and binary data. 						-->
		<!-- •	input type="hidden" name="MAX_FILE_SIZE” value="300000" - Sets the maximum allowable file size, in bytes, that can be uploaded. 	-->
		<!-- •	input name="uploadedfile" - uploadedfile is the handle we will use to reference the file in our PHP script. 						-->

		<form name="frmDeptCat" enctype="multipart/form-data" action="index.php" method="POST">
		<!-- Make sure you change the action when making a copy of this page! -->
			
			<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
			
			Product ID: <input type="text" name="txtProdID" value="" />
			
			<br /><br /><br />
			
			Choose an image to upload: <input name="uploadedfile" type="file" />
			
			<br /><br /><br />
			
			<select name="optDept" id="optDept" size="1" 
		onchange="setDeptCatOptions();">
				<option value=" " selected="selected">--Department--</option>
				<?php
				$rs3=mysql_query("Select DISTINCT(department)from pagedetails");
				while ($row3=mysql_fetch_array($rs3)) {
				
						echo '<option value="' . $row3[0] . '">' . $row3[0] . '</option>';
						
				}
			echo '</select>';
			?>
			
			<select name="optCat" size="1">
				<option value=" " selected="selected">--Category--</option>
			</select>
			
			<br /><br /><br />
			
			<input type="submit" value="Upload File"/>

		</form>
		
		<form action="index.php" method="POST">
			
			Product ID: <input type="text" name="txtProdID" value="" />
			
			<br /><br /><br />
			
			<select name="optDept" id="optDept" size="1" 
		onchange="setDeptCatOptions(document.frmDeptCat.optDept.options[document.frmDeptCat.optDept.selectedIndex].value);">
				<option value=" " selected="selected">--Department--</option>
				<?php
				$rs3=mysql_query("Select DISTINCT(department)from pagedetails");
				while ($row3=mysql_fetch_array($rs3)) {
				
						echo '<option value="' . $row3[0] . '">' . $row3[0] . '</option>';
						
				}
			echo '</select>';
			?>
			
			<select name="optCat" size="1">
				<option value=" " selected="selected">--Category--</option>
			</select>
			
			<br /><br /><br />
			
			Product Name: <input type="text" name="txtProdName" value="" />
			
			<br /><br /><br />
			
			Product Description: <input type="text" name="txtProdDescription" value="" />
			
			<br /><br /><br />
			
			Thumbnail Height Size: <input type="text" name="txtThumbnailHeightSize" value="" />
			
			<br /><br /><br />
			
			Regular Price: <input type="text" name="txtRegularPrice" value="" />
			
			<br /><br /><br />
			
			Sale Price: <input type="text" name="txtSalePrice" value="" />
			
			<br /><br /><br />
			
			Sale Dates: <input type="text" name="txtSaleDates" value="" />
			
			<br /><br /><br />
			
			Option 1: <input type="text" name="txtOption1" value="" />
			
			<br /><br /><br />
			
			Option 2: <input type="text" name="txtOption2" value="" />
			
			<br /><br /><br />
			
			Option 3: <input type="text" name="txtOption3" value="" />
			
			<br /><br /><br />
			
			Option 4: <input type="text" name="txtOption4" value="" />
			
			<br /><br /><br />
			
			Number In Stock: <input type="text" name="txtNumberInStock" value="" />
			
			<br /><br /><br />
			
			<input type="submit" value="Add Product"/>

		</form>
		
		<form action="index.php" method="POST">
				
			Add New Department: <input type="text" name="txtAddNewDepartment" value="" />
				
			<br /><br /><br />
				
			Add New Category: <input type="text" name="txtAddNewCategory" value="" />
				
			<br /><br /><br />
				
			<input type="submit" value="Add Department or Category"/>
		
		</form>
		
		<form action="index.php" method="POST">
				
			Edit Page Title: <input type="text" name="txtEditPageInfo" value="" />
				
			<br /><br /><br />
				
			Edit Page Meta: <input type="text" name="txtEditPageMeta" value="" />
				
			<br /><br /><br />
				
			<input type="submit" value="Edit Page Info"/>
		
		</form>
		
		<!-- This link is provided for debug purposes.  If you use it, it shows that if you surf to the page 	-->
		<!-- without uploading anything, the PHP code at the top does not get executed.							-->											
		<a href="index.php">Reload page (without uploading anything)</a>

		<?php
		// For debug purposes only																						
		// We will use the "Super Global" $_FILES to access our uploaded file, specifically $_FILES['uploadedfile']. 	
		// You've seen $_POST previously.																				

			echo '<pre> $_POST ';
			print_r($_POST);
			echo '</pre>';

			echo '<pre> $_FILES ';
			print_r($_FILES);
			echo '</pre>';

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
<?php
	}
}
?>