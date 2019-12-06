<?php get_header();?>
<main class="container my-5">
    <h1 class='my-3'><?php the_title();?></h1>
    <?php if(have_posts()){
         while(have_posts()){ the_post();
            the_content();
        }
    }?>
</main>
<?php get_footer();?>