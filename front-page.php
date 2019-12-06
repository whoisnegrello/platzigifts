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
            <div class="col-12">
                <select class="form-control" name="categorias-productos" id="categorias-productos">
                    <option value="">Categorías de Productos</option>
                    <?php
                        $args = array(
                            'orderby'    => 'name', 
                            'order'      => 'ASC',
                            'hide_empty' => true
                        );
                        $terms = get_terms('categorias-productos', $args);

                        foreach ($terms as $term){
                            echo '<option value="'.$term->slug.'">'.$term->name.'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <div id="resultado" class="row justify-content-center text-center">
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
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <h2>Últimas Novedades</h2>
            </div>
        </div>
        <div id="resultado-novedades" class="row">

        </div>
    </div>
</main>

<?php get_footer();?>