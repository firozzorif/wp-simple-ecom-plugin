<?php get_header(); ?>
<div style="max-width:800px; margin:20px auto; padding:20px; border:1px solid #ddd; border-radius:5px;">
    <h1><?php the_title(); ?></h1>
    <div><?php if (has_post_thumbnail()) the_post_thumbnail('large'); ?></div>
    <div style="margin-top:15px;"><?php the_content(); ?></div>
    <p><strong>Price: $<?php echo get_post_meta(get_the_ID(), 'price', true); ?></strong></p>
    <a href="?add_to_cart=<?php echo get_the_ID(); ?>" style="display:inline-block; padding:10px 15px; background:#0073aa; color:#fff; text-decoration:none; margin-top:20px;">Add to Cart</a>
</div>
<?php get_footer(); ?>
