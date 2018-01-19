<?php
/*
Template Name: About
*/
get_header(); 
while ( have_posts() ) : the_post();
        // check if the flexible content field has rows of data
        if( have_rows('page') ):

             // loop through the rows of data
            while ( have_rows('page') ) : the_row();
              
                akad_route( get_row_layout() );

            endwhile;

        else :

            // no layouts found

        endif;
endwhile; // End of the loop.
get_footer();

?>