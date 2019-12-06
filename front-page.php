<?php get_header();?>

<main class="container my-5">
    <h1 class="text-center ">
        <?php the_title();?>
    </h1>
    <?php if(have_posts()){
         while(have_posts()){ the_post();
            the_content();
        }
    }?>

    
    <div class="lista-productos my-5">
        <h2 class='text-center'>PRODUCTOS</h2>
        <div class="row">
        <?php
            $args = array(
                'post_type' => 'producto',
                'posts_per_page' => -1,
                'order'     => 'ASC',
                'orderby' => 'title',
            );

            $productos = new WP_Query($args);      
            
            if($productos->have_posts()){
                while($productos->have_posts()){ $productos->the_post();?>
                <div class="col-md-4 col-12 my-3">
                    <figure>
                      <?php the_post_thumbnail('large'); ?>
                    </figure>
                    <h4 class='my-2'>
                        <a href="<?php the_permalink();?>">
                            <?php the_title(); ?>
                        </a>
                    </h4>
                </div>
         <?php  }
            }
        ?>
        </div>
    </div>
</main>

<?php get_footer();?>