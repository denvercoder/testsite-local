<?php
/**
 * Template part for displaying blog posts.
 *
 * @package Aglee Lite
 */

?>
<h1 class="blog_category_title"><?php _e('Blog', 'aglee-lite'); ?></h1>
<?php
$aglee_lite_blog_display_type = get_theme_mod('blog_post_layout','blog_image_large');
 
 $aglee_lite_blog_display_class = '';
 switch($aglee_lite_blog_display_type){
    case 'blog_image_large' :
        $aglee_lite_blog_display_class = 'blog-image-large';       
        break;
    case 'blog_image_medium' :
        $aglee_lite_blog_display_class = 'blog-image-medium';       
        break;
    case 'blog_image_alternate_medium' :
        $aglee_lite_blog_display_class = 'blog-image-alternate-medium';       
        break;
    case 'blog_full_content' :
        $aglee_lite_blog_display_class = 'blog-full-content';       
        break;
    default:
        $aglee_lite_blog_display_class = 'blog-image-large';
 } 
 
$aglee_lite_blog_cat =  get_theme_mod('blog_category_select_setting');
if(empty($aglee_lite_blog_cat)){
    ?>
    <h1><?php _e('Select any of your post categories as a blog category','aglee-lite'); ?></h1>
    <?php 
}else{
    
    $aglee_lite_args = array(
            'post_type' => 'post',
            'cat' => $aglee_lite_blog_cat,
            'posts_per_page' => -1,
            'post_status' => 'publish'
            );
    $aglee_lite_blog_query = new WP_Query($aglee_lite_args);
    if($aglee_lite_blog_query -> have_posts()){
        while($aglee_lite_blog_query -> have_posts()){
            $aglee_lite_blog_query -> the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            	<div class="entry-content">
            		<?php
                    if($aglee_lite_blog_display_class == 'blog-full-content'){
                        $aglee_lite_img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'aglee-lite-blog-full-width', true );
                    }
                    elseif($aglee_lite_blog_display_class == 'blog-image-large'){
                        $aglee_lite_img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'aglee-lite-blog-large', true );
                    }else{
                        $aglee_lite_img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'aglee-lite-blog-medium', true ); 
                    }
            		?>
                    <div class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <?php if(has_post_thumbnail()){ ?>
                    <a href="<?php the_permalink(); ?>" class="blog_listing_img">
                        <img src="<?php echo esc_url($aglee_lite_img_src[0]); ?>" />
                    </a>
                    <?php } ?>
                    <div class="blog-excerpt">
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>"><?php echo __('Read More','aglee-lite');?></a>
                    </div>
                    <div class="blog-bottom-content">
                        <span class="blog_author"><?php echo get_the_author();?></span>
                        <span class="blog_post_date"><?php echo get_the_date(); ?></span>
                    </div>
            	</div><!-- .entry-content -->
            
            </article><!-- #post-## -->
            
            <?php 
        }
    }
?>

<?php } ?>