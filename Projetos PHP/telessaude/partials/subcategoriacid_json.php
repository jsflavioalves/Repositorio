<?php
if(@!$_GET['term'])
	exit;
	
require_once('../includes/frameworkajax.php');	
$term = @$_GET['term'];
$sql = "select ci_subcategoria_cid, nm_subcategoria_cid from tb_subcategoria_cid 
where nm_subcategoria_cid ilike '%{$term}%'
order by 2 asc
limit 10";
$query = @Connection::query($sql);
$str = '[';
while($row = $query->fetch()){
	$str .= '{"id":"'.$row['ci_subcategoria_cid'].'","label":"'.$row['nm_subcategoria_cid'].'"},';
}
echo substr($str, 0, -1).']';
?>