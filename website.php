<?php

use \Hcode\Page;
use \Hcode\Model\Category;
use \Hcode\Model\Product;

$app->get('/', function() {

	$products = Product::listAll();
    
	$page = new Page();

	$page->setTpl("home".DIRECTORY_SEPARATOR."index", [
		"products"=>Product::checkList($products)
	]);

});

$app->get("/categories/:id", function ($idcategory) {

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new Page();

	$page->setTpl("categories".DIRECTORY_SEPARATOR."category", [
		'category'=>$category->getValues(),
		'products'=>Product::checkList($category->getProducts())
	]);

});

?>