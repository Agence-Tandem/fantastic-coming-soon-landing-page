<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) { die('Not allowed'); }

class Pagination
{
	function getStartRow($page, $limit)
	{
		$startrow = $page * $limit - ($limit);
		return $startrow;
	}
	function showPageNumbers($totalrows, $page, $limit)
	{
		$query_string = $this->queryString();
		$pagination_links = null;
		$numofpages = $totalrows / $limit;
		for ($i = 1; $i <= $numofpages; $i++) {
			if ($i == $page) {
				$pagination_links .= '<li class="active"><span>' . $i . '</span></li> ';
			} else {
				$pagination_links .= '<li class="page-link"><a href="?page=' . $i . '&' . $query_string . '">' . $i . '</a></li> ';
			}
		}
		if (($totalrows % $limit) != 0) {
			if ($i == $page) {
				$pagination_links .= '<li class="active"><span>' . $i . '</span></li> ';
			} else {
				$pagination_links .= '<li class="page-link"><a href="?page=' . $i . '&' . $query_string . '">' . $i . '</a></li> ';
			}
		}
		return $pagination_links;
	}
	function showNext($totalrows, $page, $limit, $text = '<i class="icon-caret-right"></i>')
	{
		$next_link = null;
		$numofpages = $totalrows / $limit;
		$query_string = $this->queryString();
		if ($page < $numofpages) {
			$page++;
			$next_link = '<li class="page-link"><a href="?page=' . $page . '&' . $query_string . '">' . $text . '</a></li>';
		} else
			$next_link = '<li class="disabled"><a href="?page=' . $page . '&' . $query_string . '">' . $text . '</a></li>';
			return $next_link;
		}
	function showPrev($totalrows, $page, $limit, $text = '<i class="icon-caret-left"></i>')
	{
		$prev_link = null;
		$numofpages = $totalrows / $limit;
		$query_string = $this->queryString();
		if ($page > 1) {
			$page--;
			$prev_link = '<li class="page-link"><a href="?page=' . $page . '&' . $query_string . '">' . $text . '</a></li>';
		} else
			$prev_link = '<li class="disabled"><a href="?page=' . $page . '&' . $query_string . '">' . $text . '</a></li>';
		return $prev_link;
	}
	function queryString()
	{
		$query_string = preg_replace("/page=[0-9]{0,10}&/", "", $_SERVER['QUERY_STRING']);
		return $query_string;
	}
}
?>