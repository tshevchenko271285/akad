<?php
/*
Template Name: About
*/



get_header(); 
while ( have_posts() ) : the_post();
    get_template_part( 'template-parts/content', 'site-hero2' );
        // check if the flexible content field has rows of data
        if( have_rows('page') ):

             // loop through the rows of data
            while ( have_rows('page') ) : the_row();
              
                if( get_row_layout() == 'about' ) :
                    get_template_part( 'template-parts/content', 'about' );

                elseif( get_row_layout() == 'benefits' ): 
                    get_template_part( 'template-parts/content', 'benefits' );

                elseif( get_row_layout() == 'dream_team' ): 
                    get_template_part( 'template-parts/content', 'dream-team' );

                elseif( get_row_layout() == 'light_gray' ): 
                    get_template_part( 'template-parts/content', 'light-gray' );

                elseif( get_row_layout() == 'testomonials' ): 
                    get_template_part( 'template-parts/content', 'testomonials' );

                endif;

            endwhile;

        else :

            // no layouts found

        endif;


    get_template_part( 'template-parts/content', 'newsletter' );

endwhile; // End of the loop.
get_footer();

?>