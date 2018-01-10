<?php
class cost_es_cls_widget extends es_cls_widget{
	public static function load_subscription($arr) {
		$es_name = trim($arr['es_name']);
		$es_desc = trim($arr['es_desc']);
		$es_group = trim($arr['es_group']);
		$url = "'" . home_url() . "'";
		$es = "";

		global $es_includes;
		if (!isset($es_includes) || $es_includes !== true) {
			$es_includes = true;
		}

		$es .= '<form class="" data-es_form_id="es_shortcode_form">';

		if( $es_desc != "" ) {
			$es .= '<div class="es_caption">'.$es_desc.'</div>';
		}

		if( $es_name == "YES" ) {
			$es .= '<div class="es_lablebox"><label class="es_shortcode_form_name">'.__( 'Name', ES_TDOMAIN ).'</label></div>';
			$es .= '<div class="es_textbox">';
				$es .= '<input type="text" id="es_txt_name_pg" class="es_textbox_class" name="es_txt_name_pg" value="" maxlength="225">';
			$es .= '</div>';
		}
		$es .= '<div class="input_1">';
			$es .= '<input type="text" id="es_txt_email_pg" class="" name="es_txt_email_pg" onkeypress="if(event.keyCode==13) es_submit_pages(event, '.$url.')" value="" placeholder="" maxlength="225"><span>your email</span>';
		$es .= '</div>';
			$es .= '<input type="button" id="es_txt_button_pg" class="btn green" name="es_txt_button_pg" onClick="return es_submit_pages(event, '.$url.')" value="'.__( 'SEND', ES_TDOMAIN ).'" style="margin-top:20px">';

		$es .= '<div class="es_msg" id="es_shortcode_msg"><span id="es_msg_pg"></span></div>';

		if( $es_name != "YES" ) {
			$es .= '<input type="hidden" id="es_txt_name_pg" name="es_txt_name_pg" value="">';
		}
		$es .= '<input type="hidden" id="es_txt_group_pg" name="es_txt_group_pg" value="'.$es_group.'">';

		$es .= '</form>';
		return $es;
	}
}