<?php
/**
 * The main template file
 */

get_header(); ?>


<?php 

    $cat_name = get_category(get_query_var('cat'));

   if ( get_query_var('paged') ) {

$paged = get_query_var('paged');

} elseif ( get_query_var('page') ) {

$paged = get_query_var('page');

} else {

   $paged = 1;

}


  $query_args = array(
      'post_type' => 'post',
      'posts_per_page' => 5,
      'paged' => $paged,
	  'category_name' => $cat_name->slug,
    );

   $wp_query = new WP_Query( $query_args ); ?>
    <!-- START OF MAIN CONTENT -->
    <div class="maincontent rightsidebar">
		 
        <div class="contentinner bloglist">
  <?php if (  $wp_query->have_posts() ) : ?>

    <!-- the loop -->
    <?php while (  $wp_query->have_posts() ) :  $wp_query->the_post(); 
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($wp_query->post->ID), 'blog-thumb', false, '' );
	
	//var_dump($wp_query);?>
	
	
	        <div class="blogpanel blogpanel-smallthumb">
                <ul class="blogmeta">
                    <li class="date"><a><?php echo get_the_date('M j, Y'); ?></a></li>
                </ul>
                <h2 class="blogtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="blogimg blogimg-plain">
                	<a href="<?php the_permalink(); ?>" class="imghoverborder"><img src="<?php echo $src[0];?>" alt="" /></a>
                </div>
                <div class="blogsummary justify">
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="readmore">Continue Reading <span>&rarr;</span></a>
                </div><!--blogsummary-->
                <br class="clearall" />
                
        	</div><!--blogpanel-->
    <?php endwhile; ?>
    <!-- end of the loop -->

    <!-- pagination here -->
  		    <?php
      if (function_exists(custom_pagination)) {
        custom_pagination($the_query->max_num_pages,"",$paged);
      }
    ?>


  <?php wp_reset_postdata(); ?>


  <?php else:  ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
                     
        </div><!--contentinner--> 
                
<?php include 'template/sidebar-news.php'; ?>
                       
    </div><!--maincontent-->
    <!-- END OF MAIN CONTENT -->

<?php get_footer(); ?>