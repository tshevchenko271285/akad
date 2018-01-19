<?php
/*
Template Name: Contact Us
*/
get_header(); 
while ( have_posts() ) : the_post();
$title = get_field('title');
$map = get_field('map');
    get_template_part( 'template-parts/content', 'site-hero2' ); 
?>
<script type="text/javascript">
    var mapLat = <?php echo $map['lat']; ?>;
    var mapLng = <?php echo $map['lng']; ?>;
</script>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                       <?php echo do_shortcode( '[contact-form-7 id="481" title="Contact form 1"]' ); ?>
                    </div>

                    <h4 class="montserrat-text uppercase" style="margin-top:100px">
                        <?php echo $title; ?>
                    </h4>
                    <?php the_content(); ?>
                    <ul class="social-icons" style="margin-top:30px;">
                        <?php 
                            $footer['copytext'] = get_field('footer_copytext', 'options');
                            $footer['facebook_url'] = get_field('footer_facebook_url', 'options');
                            $footer['twitter_url'] = get_field('footer_twitter_url', 'options');
                            $footer['youtube_url'] = get_field('footer_youtube_url', 'options');
                            $footer['linkedin_url'] = get_field('footer_linkedin_url', 'options');
                            $footer['pinterest_url'] = get_field('footer_pinterest_url', 'options');
                            $footer['instagram_url'] = get_field('footer_instagram_url', 'options');
                        ?>
                        <?php if( strlen($footer['facebook_url']) ) { ?>
                            <li><a href="<?php echo $footer['facebook_url']; ?>"><i class="icon ion-social-facebook"></i></a></li>
                        <?php } ?>
                        <?php if( strlen($footer['twitter_url']) ) { ?>
                            <li><a href="<?php echo $footer['twitter_url']; ?>"><i class="icon ion-social-twitter"></i></a></li>
                        <?php } ?>
                        <?php if( strlen($footer['youtube_url']) ) { ?>
                            <li><a href="<?php echo $footer['youtube_url']; ?>"><i class="icon ion-social-youtube"></i></a></li>
                        <?php } ?>
                        <?php if( strlen($footer['linkedin_url']) ) { ?>
                            <li><a href="<?php echo $footer['linkedin_url']; ?>"><i class="icon ion-social-linkedin"></i></a></li>
                        <?php } ?>
                        <?php if( strlen($footer['pinterest_url']) ) { ?>
                            <li><a href="<?php echo $footer['pinterest_url']; ?>"><i class="icon ion-social-pinterest"></i></a></li>
                        <?php } ?>
                        <?php if( strlen($footer['instagram_url']) ) { ?>
                            <li><a href="<?php echo $footer['instagram_url']; ?>"><i class="icon ion-social-instagram"></i></a></li>
                        <?php } ?>
                    </ul>
                </div><!-- end col -->

                <div class="col-md-6">
                    <div id="map" style="width:100%"></div>
                </div>

            </div>
        </div>
    </section>

<?php
    get_template_part( 'template-parts/content', 'newsletter' );

    wp_enqueue_script( 'akad-jquery-google-map-script', 'http://maps.googleapis.com/maps/api/js?key=AIzaSyATEUMKV0y03_r6Rqmt3w743M2InPC9Qp8', array(), '', true );

    wp_enqueue_script( 'akad-map-init-script', get_template_directory_uri() . '/js/google-map-init.js', array(), '20151215', true );

endwhile; // End of the loop. 
?>
<?php
get_footer();
?>