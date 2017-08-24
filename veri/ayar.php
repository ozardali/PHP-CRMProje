<?php

	@ob_start();
	@session_start();
	define("dbhost","localhost");
	define("dbkul","root");
	define("dbsif","");
	define("db","CRMProje");
	@mysql_connect(dbhost,dbkul,dbsif) or die('Veritabani baglanti hatasi.');
	@mysql_select_db(db)or die(db . ' - Veritabani bulunamadi.');
	@mysql_query("SET NAMES UTF8");
	
?>