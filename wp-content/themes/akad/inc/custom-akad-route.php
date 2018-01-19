<?php 
function akad_route($str) {
	switch($str) {

		case 'about' : get_template_part( 'template-parts/content', 'about' ); break;
		case 'benefits' : get_template_part( 'template-parts/content', 'benefits' ); break;
		case 'benefits_2' : get_template_part( 'template-parts/content', 'benefits-2' ); break;
		case 'dream_team' : get_template_part( 'template-parts/content', 'dream-team' ); break;
		case 'light_gray' : get_template_part( 'template-parts/content', 'light-gray' ); break;
		case 'testomonials' : get_template_part( 'template-parts/content', 'testomonials' ); break;
		case 'what_me_do' : get_template_part( 'template-parts/content', 'what-me-do' ); break;
		case 'pricing_plans' : get_template_part( 'template-parts/content', 'pracing-plans' ); break;
		case 'banner' : get_template_part( 'template-parts/content', 'site-hero2' ); break;
		case 'portfolio_list' : get_template_part( 'template-parts/content', 'portfolio-block' ); break;
		case 'banner_home' : get_template_part( 'template-parts/content', 'site-hero' ); break;
		case 'services' : get_template_part( 'template-parts/content', 'services' ); break;
		case 'banner_home' : get_template_part( 'template-parts/content', 'site-hero' ); break;
		case 'random_post' : get_template_part( 'template-parts/content', 'history-of-agency' ); break;

		default : echo 'Not template for ' . $str;
	}
}
