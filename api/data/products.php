<?php
require "../models/products.php";

switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET':
		petition_Get();
		break;
	case 'POST':
		petition_Post();
		break;
	case 'PUT':
		petition_Put();
		break;
	case 'DELETE':
		petition_Delete();
		break;
}

function petition_Get()
{
	$products = new Products;
	if (isset($_GET['search'])) {

		switch ($_GET['search']) {
			case 'id':
				$products->select_id($_GET['id']);
				break;
			case 'name':
				$products->select_name($_GET['name']);
				break;
		}
	} else {
		$products->select_all();
	}
}


function petition_Post()
{
	$products = new Products;
	$products->insert();
}


function petition_Put()
{
	if (isset($_GET['id'])) {
		$products = new Products;
		$products->update($_GET['id']);
	}
}


function petition_Delete()
{
	if (isset($_GET['id'])) {
		$products = new Products;
		$products->delete($_GET['id']);
	}
}
