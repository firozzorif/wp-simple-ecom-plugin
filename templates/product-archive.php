<?php get_header(); ?>
<h1 style="text-align:center;">Our Products</h1>
<div style="display:flex; flex-wrap:wrap; justify-content:center; gap:20px;">
<?php while (have_posts()) : the_post(); ?>
    <div style="border:1px solid #ddd; padding:15px; width:220px; text-align:center; border-radius:5px;">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php if (has_post_thumbnail()) the_post_thumbnail('medium'); ?>
        <p><strong>$<?php echo get_post_meta(get_the_ID(), 'price', true); ?></strong></p>
        <a href="?add_to_cart=<?php echo get_the_ID(); ?>" style="display:inline-block; padding:8px 12px; background:#0073aa; color:#fff; text-decoration:none; margin-top:10px;">Add to Cart</a>
    </div>
<?php endwhile; ?>
</div>
<?php get_footer(); ?>
