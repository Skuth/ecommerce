<?php

use \Skuth\PageAdmin;
use \Skuth\Model\User;
use \Skuth\Model\Category;

$app->get("/admin/categories", function() {

  User::verifyLogin();

  $categories = Category::listAll();

  $page = new PageAdmin();

  $page->setTpl("categories", array(
    "categories"=>$categories
  ));

});

$app->get("/admin/categories/create", function() {

  User::verifyLogin();

  $page = new PageAdmin();

  $page->setTpl("categories-create");

});

$app->post("/admin/categories/create", function() {

  User::verifyLogin();

  $category = new Category();

  $category->setData($_POST);

  $category->save();

  header("Location: /admin/categories");
  exit;

});

$app->get("/admin/categories/:idcategory/delete", function($idcategory) {

  User::verifyLogin();

  $category = new Category();

  $category->get((int)$idcategory);

  $category->delete();

  header("Location: /admin/categories");
  exit;

});


?>