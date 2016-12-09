// 1. transparancy of the items
// 2. left position of the whole menu
// 3. height position of the whole menu
// 4. width of the head items of the menu
// 5. top of the head items of the menu
// 6. space between the head items
// 7. width of the border of the head items
// 8. bordercolor of the head items
// 9. 1 to set the head items bold , 1 to set the head items normal
// 10. font-size of the head items
// 11. font-family of the head items
// 12. border style of the head items
// 13. space between the header and the items
// 14. width of the items
// 15. heigth of the items
// 16. width of the border items
// 17. color of the item border
// 18. border style of the items
// 19. font size of the items
// 20. font-family of the items
// 21. space between the item panels (multi-level)
// 22. left padding in the head item block
// 23. top padding in the head item block
// 24. icon at the left when there are subitems

//link ==> [text,url,target,text_color,background_color,
//				text_color_onmouseover,background_color_onmouseover]
//link with items ==> [text,url,target,text_color,background_color,
//				text_color_onmouseover,background_color_onmouseover,[items]] 

  LeftMenuProps = [95,0,-3,158,22,-1,1,'#bbcbdb',1,13,'Arial', 
				'solid', -15,155,22,1,'#000000','solid',11,'Arial',-1,3,1,''];

  LeftMenuLinks =[

  	['Browse Departments',null,'','white','black','white','black'],
	
	['Personal Gadgets','Products.php?PageID=100','','black','white','black','#EAEFF4',
			   [
			   	['Laptop Computers','Products.php?PageID=100','_self','#000000','#ffffff','#000000','#bbcbdb'],

				['Tablet Computers','Products.php?PageID=101', '_self', '#000000', '#ffffff', '#000000', '#bbcbdb'],

				['Smart Phones','Products.php?PageID=102','_self','#000000','#ffffff','#000000','#bbcbdb']

			   ]
	],
	
	['Personal Entertainment','Products.php?PageID=200','','black','white','black','#EAEFF4',
			   [
			   	['CDs','Products.php?PageID=200','_self','#000000','#ffffff','#000000','#bbcbdb'],

				['DVDs','Products.php?PageID=201', '_self', '#000000', '#ffffff', '#000000', '#bbcbdb'],

				['Blu-ray Discs','Products.php?PageID=202','_self','#000000','#ffffff','#000000','#bbcbdb']

			   ]
	],
	
	['Personal Accessories','Products.php?PageID=300','','black','white','black','#EAEFF4',
			   [
			   	['Adapters','Products.php?PageID=300','_self','#000000','#ffffff','#000000','#bbcbdb'],

				['Headphones','Products.php?PageID=301', '_self', '#000000', '#ffffff', '#000000', '#bbcbdb'],

				['Cables','Products.php?PageID=302','_self','#000000','#ffffff','#000000','#bbcbdb']

			   ]
	],
	
	['Language Translators','../LanguageTrans/index.php','','black','white','black','#EAEFF4',
			   [
			   	['Spanish - English','../LanguageTrans/index.php','_self','#000000','#ffffff','#000000','#bbcbdb'],

				['French - English','../LanguageTrans/FrenchEnglish.php', '_self', '#000000', '#ffffff', '#000000', '#bbcbdb'],

				['German - English','../LanguageTrans/GermanEnglish.php','_self','#000000','#ffffff','#000000','#bbcbdb']

			   ]
	],
	
	// For now, this link does nothing.
	['Closeout Specials','.','','white','red','black','#EAEFF4']
	
	
];

//window.onload = correctsize;
//window.onresize = correctsize;
//window.onresize = fresh;