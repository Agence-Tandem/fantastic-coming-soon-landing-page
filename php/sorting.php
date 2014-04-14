<?php
include 'pagination.php';
$Pagination = new Pagination();
//Column Sorting Arrows
function columnSortArrows($field, $text, $currentfield = null, $currentsort = null)
{
	$sortquery  = "sort=ASC";
	$orderquery = "orderby=" . $field;
	if ($currentsort == "ASC") {
		$sortquery = "sort=DESC";
		if ($field == "id")
			$sortarrow = '<i class="icon-sort-by-order"></i>';
		else if ($field == "email_address")
			$sortarrow = '<i class="icon-sort-by-alphabet"></i>';
		else
			$sortarrow = '<i class="icon-sort-by-attributes"></i>';
	}
	if ($currentsort == "DESC") {
		$sortquery = "sort=ASC";
		if ($field == "id")
			$sortarrow = '<i class="icon-sort-by-order-alt"></i>';
		else if ($field == "email_address")
			$sortarrow = '<i class="icon-sort-by-alphabet-alt"></i>';
		else
			$sortarrow = '<i class="icon-sort-by-attributes-alt"></i>';
	}
	if ($currentfield == $field) {
		$orderquery = "orderby=" . $field;
	} else {
		$sortarrow = null;
	}
	return '<a href="?' . $orderquery . '&' . $sortquery . '">' . $text . '</a> ' . $sortarrow;
}
//---------------------------------------------------------------------------
//Counting Total Number of Rows
$result = $mysql->query("SELECT id FROM `" . $conf['db_table_subscribers'] . "`");
$totalrows = $result->num_rows;
//Setting Item Limit Per Page
$limit = $conf['rows_per_page'];
if (isset($_GET['page']) && is_numeric(trim($_GET['page']))) {
	$page = mysqli_real_escape_string($mysql, $_GET['page']);
} else {
	$page = 1;
}
$startrow = $Pagination->getStartRow($page, $limit);
//Create Page Links
if ($conf['show_page_numbers']) {
	$pagination_links = $Pagination->showPageNumbers($totalrows, $page, $limit);
} else {
	$pagination_links = null;
}
if ($conf['show_prev_next']) {
	$prev_link = $Pagination->showPrev($totalrows, $page, $limit);
	$next_link = $Pagination->showNext($totalrows, $page, $limit);
} else {
	$prev_link = null;
	$next_link = null;
}
//If OrderBy Not Set Or Invalid, Set Default



if($totalrows>0)
{
	if (!isset($_GET['orderby']) OR trim($_GET['orderby']) == "") {
		$sql = "SELECT * FROM `" . $conf['db_table_subscribers'] . "` LIMIT 1";
		$result = $mysql->query($sql) or die($mysql->error());
		if($result->num_rows > 0) {
			$array = $result->fetch_assoc();
			$i = 0;
			foreach ($array as $key => $value) {
				if ($i > 0) {
					break;
				} else {
					$orderby = $key;
				}
				$i++;
			}
			$sort = "ASC";
		}
	} else {
		$orderby = $mysql->real_escape_string($_GET['orderby']);
	}
	//If Sort Not Set Or Invalid, Set Default
	if (!isset($_GET['sort']) OR ($_GET['sort'] != "ASC" AND $_GET['sort'] != "DESC")) {
		$sort = "ASC";
	} else {
	$sort = $mysql->real_escape_string($_GET['sort']);
	}
	//Getting Data
	$sql = "SELECT * FROM `" . $conf['db_table_subscribers'] . "` ORDER BY $orderby $sort LIMIT $startrow,$limit";
	$result = $mysql->query($sql) or die($mysql->error());
	$array = $result->fetch_assoc();
}
//Counting Active and Inactive Users

$active = mysqli_fetch_array($mysql->query("SELECT count(*) as rows FROM `" . $conf['db_table_subscribers'] . "` WHERE subscribed='1'"), MYSQLI_BOTH);
$inactive = mysqli_fetch_array($mysql->query("SELECT count(*) as rows FROM `" . $conf['db_table_subscribers'] . "` WHERE subscribed='0'"), MYSQLI_BOTH);

?>