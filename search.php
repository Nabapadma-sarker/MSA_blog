<?php get_header(); ?>
 <div class="maincontent rightsidebar">
		 
        <div class="contentinner bloglist">

<?php
$s=get_search_query();
$args = array(
                's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {
?>   
<?php
        _e("<h2 style='font-family: Roboto Condensed, Helvetica Neue, Arial, sans-serif; font-weight:bold;color:#333'>Search Results for: ".get_query_var('s')."</h2>");
		?>
      <?php
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->post->ID), 'blog-thumb', false, '' );
?>
	
	
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
                 <?php
        }
    }

	else{
?>       <div class="blogpanel blogpanel-smallthumb">
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
        </div>
<?php } ?>
   </div><!--contentinner--> 
                
<?php include 'template/sidebar-news.php'; 
	wp_reset_postdata();
?>
                       
    </div><!--maincontent-->
    <!-- END OF MAIN CONTENT -->

<?php get_footer(); ?>