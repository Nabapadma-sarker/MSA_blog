<?php
/**
 * 
 */

get_header(); ?>

	    <!-- START OF MAIN CONTENT -->
    <div class="maincontent rightsidebar">
    	
	<?php while ( have_posts() ) : the_post();?>	 
        <div class="contentinner blogsingle">
                    
        	<div class="blogpanel blogpanel-smallthumb">
                <ul class="blogmeta">
                    <li class="date"><a><?php echo get_the_date('M j, Y'); ?></a></li>
                </ul>
                <h2 class="blogtitle"><?php the_title();?></h2>
                <div class="blogimg blogimg-plain">
                	<img class="blogimg-post" src="<?php echo the_post_thumbnail_url();?>" alt="" />
                </div>
                <div class="blogsummary justify"><?php the_content(); ?></div>
        	</div><!--blogpanel-->
            
<?php include 'template/share-blog.php'; ?>
            
            <br class="clearall" />
            
        </div><!--contentinner--> 
        <?php endwhile; ?>	
<?php include 'template/sidebar-news.php'; ?>
                       
    </div><!--maincontent-->
    <!-- END OF MAIN CONTENT -->

	

<?php get_footer(); ?>