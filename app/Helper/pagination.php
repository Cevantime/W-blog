<?php


if (!function_exists('pagination')) {

	function pagination($total_number_of_elements, $target_action, $current_index = 0, $amplitude = 2, $jump = 1) {
		$html = '';
		$target_action = getApp()->getBasePath().'/'.$target_action;
		$number_of_element_per_page = getApp()->getConfig('number_of_element_per_page');
		if ($total_number_of_elements > 0) {
			$html .= '<ul class="pagination">';
			if ($current_index > $amplitude) {
				$html .= '<li><a href="'.$target_action . '/' . max(0, $current_index - $amplitude - $jump).'">«</a></li>';
			}
			for ($i = max(0, $current_index - $amplitude); $i <= min(($total_number_of_elements - 1) / $number_of_element_per_page, $current_index + $amplitude); $i++) {
				$html .= '<li ' . (($i == $current_index) ? 'class="active"' : '') . '><a href="'. $target_action . '/' . $i . '">' . ($i + 1) . '</a></li>';
			}
			$nbPage = intval($total_number_of_elements / $number_of_element_per_page);
			if ($nbPage > $amplitude && $current_index + $amplitude < $nbPage-1) {
				$html .= '<li><a href="'. $target_action . '/' . min($nbPage-1, $current_index + $amplitude + $jump) . '">»</a></li>';
			}
			$html .= '</ul>';
		}
		return $html;
	}

}
?>