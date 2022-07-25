<?php 

require_once ('model/model.php');

function fetchAllProduct(){
	return showAllProduct();

}
function fetchProduct($id){
	return showProduct($id);

}
