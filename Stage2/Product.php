<?php
	//唔好hardcode任何column name! 我知會麻煩啲, 但唔該, 唔好hardcode
	//Table名可以hardcode
	//code 寫法參照User.php
	include_once("field_const.php");
	include_once("dbconn.php");	
	
	//Products
	function addProduct($prodName, $prodPrice, $prodPhoto, $stockQty, $catNo, $suppNo) {
		if (isset($prodName) && is_array($prodName)) {
			$prodObj = $prodName;
			//for JSON Object
		}
	}
	
	function delProduct($prodNo) {
		
	}
	
	function getAllProducts() {
		//desc, asc
	}
	
	function getProduct($prodNo) {
		
	}
	
	function getProducts($nameWith, $priceMin, $priceMax, $stockQty, $catNo, $suppNo) {
		//desc, asc
	}
	
	function getProductsByName($nameWith) {
		return getProducts($nameWith, null, null, null, null, null);
	}
	
	function getProductsByCategory($catNo) {
		return getProducts(null, null, null, null, $catNo, null);
	}
	
	function getProductsBySupplier($suppNo) {
		return getProducts(null, null, null, null, null, $suppNO);
	}
?>