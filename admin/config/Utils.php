<?php
/**
 *  1 c 1 до 5-го продукта
 *	2 с 6 по 10-ый продукт
 *	3 с 11 по 15-ый продукт
 *	5 * ( 2 - 1 ) + 1 = 6
 *	5 * ( 3 - 1 ) + 1 = 11
 *	5 * ( 4 - 1 ) + 1 = 16
 *	$perPage - count produscts in this page
 *	$page - $_GET['page'] (number this page)
 *	LIMIT $perPage * ($page - 1) + 1, $itemsCount
 */
class Utils
{	
	public function drawPage($totalItems, $perPage){
		$pages = ceil($totalItems / $perPage); // 25 / 2 = 12.5 -> 13 ---- 25 / 10 = 2.5 -> 3
		if (!isset($_GET['page']) || intval($_GET['page']) == 0) {
			$page = 1;
		} else if (intval($_GET['page']) > $pages) {
			$page = $pages;
		} else {
			$page = intval($_GET['page']);
		}

		$pager = "<nav aria-label='Page navigatio'>";
		$pager .= "<div class='pagination'>";
		$pager .= "<a href='/products?page=1' aria-label='Previos'><span aria-hidan='true'>&laquo</span>Начало</a>";
		for ($i = 2; $i < $pages; $i++) {
			$pager .= "<a href='/products?page=". $i ."'>". $i ."</a>";
		}
		$pager .= "<a href='/products?page=". $pages ."' aria-label='Next'>Конец<span aria-hidan='true'>&raquo</span></a>";
		$pager .= "</div>";

		return $pager;
	}
	
}
?>