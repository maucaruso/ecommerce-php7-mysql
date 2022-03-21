<?php

use \Hcode\Page;
use \Hcode\Model\Category;

$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("home".DIRECTORY_SEPARATOR."index");

});

$app->get("/categories/:id", function ($idcategory) {

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new Page();

	$page->setTpl("categories".DIRECTORY_SEPARATOR."category", [
		'category'=>$category->getValues(),
		'products'=>[]
	]);

});

?>