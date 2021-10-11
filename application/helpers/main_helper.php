<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('dd')){
	function dd($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
    }
}
if(!function_exists('format_date_view')){
	function format_date_view($fecha) {
		$date = new DateTime($fecha);
		return $date->format(FOMAT_DATE_VIEW);
    }
}
if(!function_exists('format_datetime_view')){
	function format_datetime_view($fecha) {
		$date = new DateTime($fecha);
		return $date->format(FOMAT_DATE_VIEW.' H:i:s');
    }
}
if(!function_exists('icon_status')){
	function icon_status($status) {
		$icon = '<i class="ti-na icon-sm text-danger"></i>';
		if($status == 'activo')
			$icon = '<i class="ti-check icon-sm text-success"></i>';
		return $icon;
    }
}
if(!function_exists('badge_text_remove')){

	function badge_text_remove($text, $id,$color = 'primary') {
		return '<label class="badge badge-outline-'.$color.'">'.$text.'<i class="ti-trash ml-3" onclick="removeActividad('.$id.')"></i></label>';


    }
}
if(!function_exists('check_empty')){
	function check_empty($text) {
		$res = '--';
		if($text != ''){
			$res = $text;
		}
		return $res;
    }
}
if(!function_exists('format_motnh')){
	function format_motnh($monthNumber) {
		$meses = array(
			'1'  => 'ENERO',
			'2'  => 'FEBRERO',
			'3'  => 'MARZO',
			'4'  => 'ABRIL',
			'5'  => 'MAYO',
			'6'  => 'JUNIO',
			'7'  => 'JULIO',
			'8'  => 'AGOSTO',
			'9'  => 'SEPTIEMBRE',
			'10' => 'OCTUBRE',
			'11' => 'NOVIEMBRE',
			'12' => 'DICIEMBRE'
		);
		if(array_key_exists($monthNumber, $meses)){
			return $meses[$monthNumber];
		}else{
			return "ERROR";
		}
    }
}

