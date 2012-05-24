<?php
/**
 * Example Database connection settings and DB relationship mapping
 * $dbmap[Table A]['has_one'][Table B] = array('foreign_key'=> Table B's column that links to Table A );
 * $dbmap[Table B]['belongs_to'][Table A] = array('foreign_key'=> Table A's column where Table B links to );
 */

//$dbmap['Post']['has_many']['Tag'] = array('foreign_key'=>'post_id', 'through'=>'post_tag');
//$dbmap['Tag']['has_many']['Post'] = array('foreign_key'=>'tag_id', 'through'=>'post_tag');
// http://www.e-crusade.com.cn/phpmyadmin/index.php
//$dbmap['Post']['has_many']['Comment'] = array('foreign_key'=>'post_id');
//$dbmap['Comment']['belongs_to']['Post'] = array('foreign_key'=>'id');
//relationship  
//$dbmap['UserQr']['belongs_to']['User'] = array('foreign_key'=>'id');
//$dbmap['User']['has_many']['UserQr'] = array('foreign_key'=>'user_id');

/**
 * Database settings are case sensitive.
 * To set collation and charset of the db connection, use the key 'collate' and 'charset'
 * array('localhost', 'database', 'root', '1234', 'mysql', true, 'collate'=>'utf8_unicode_ci', 'charset'=>'utf8'); 
 */

$dbconfig['dev'] = getDataConfiguration();

function getDataConfiguration() {
	switch ($_SERVER['HTTP_HOST']) {
		case 'local';
			return array('localhost', 'database', 'root', 'pwd', 'mysql', false, 'collate'=>'utf8_unicode_ci', 'charset'=>'utf8');
		default:
			return array('localhost', 'database', 'root', 'pwd', 'mysql', false, 'collate'=>'utf8_unicode_ci', 'charset'=>'utf8');
	}
}

