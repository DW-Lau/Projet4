<?php
//var_dump(is_file("model/sublogModel.php")). "\n";
require("../model/sublogModel.php");
	if ( isset($_POST['checkPseudo'])&& isset($_POST['checkmdp']) ){
		checkInfos();
	}else{
		subInfos();
		}
require("../php/pages/espacemembre.php");

