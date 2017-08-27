<?php

use \Skuth\Page;

$app->get('/', function(){

	$page = new Page();

	$page->setTpl("index");

});

?>