# Magento-php-list-product

Problem Statement
- Invoke Magento interface by taking PHP as client to login and get product list

Solution Chosen 
- Magento 2 Rest API

Solution Details
- Magento 2 uses token based rest API.
	-- First you need to authenticate user and get the token from magento 2.
	-- After getting token you have to pass this token to every request you performed.

Folder Details
When you unzip the scr file there would two folder.

- Screen-Shots : Contains the print screen of Results acheived.

- magentoRest  : Contains files listed below
		 -- index.php     : Main page where it fetchs the username and password from user to fetch the products.   
		 -- process.php	  : Submitted details are varefied and processed with result data 
		 -- curl_lib.php  : Libaray class that handles all the CURL operations
		 -- template.php  : Just to show data in fancy stuffs.
		 -- env.json      : Config file

