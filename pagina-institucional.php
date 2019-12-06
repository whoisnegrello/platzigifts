<?php /**
 * Template Name: Página institucional
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <?php if (have_posts()) { ?>
                <?php while (have_posts()) { ?>
                    <?php the_post(); ?>
                    <h1>Sobre Platzi Gifts</h1>
                    <?php the_content(); ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>