<?php get_header(); ?>
<main class="container">
    <h1><?php the_title(); ?></h1>

    <?php if(have_posts()){
            while(have_posts()){ the_post();
    ?>

    <div class="row my-5">
        <div class="col-md-6 col-12">
            <?php the_post_thumbnail('large')?>
        </div>
        <div class="col-md-6 col-12">
            <?php the_content();?>
        </div>
    </div>
    <?php }
        } ?>

        <?php $args = array(
            'post_type' => 'producto',
            'posts_per_page' => -1,
            'order'     => 'ASC',
            'orderby' => 'title'
        );
        $productos = new WP_Query($args); ?>

        <?php if ($productos->have_posts()) { ?>
        <div class="row justify-content-center">
            <?php while($productos->have_posts()) { ?>
                <?php $productos->the_post(); ?>
                <div class="col-md-2 col-12 my-3">
                    <figure><?php the_post_thumbnail('thumbnail'); ?></figure>
                    <h4 class='my-2'>
                        <a href="<?php the_permalink();?>">
                            <?php the_title(); ?>
                        </a>
                    </h4>
                </div>
            <?php } ?>
        </div>
        <?php } ?>
</main>
<?php get_footer(); ?>