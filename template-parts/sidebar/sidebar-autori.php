<?php 

if ( get_field('spouse') || get_field('sibling') || get_field('children') || get_field('knows') ) {

    echo '<section id="relations" class="widget widget_archive"><h2 class="widget-title"><span itemprop="relatedTo">Relazioni</span></h2><div class="list-group">'; ?>
        <?php 

        $posts = get_field('spouse');

        if( $posts ): ?>

            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>

                    <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><link itemprop="spouse" href="<?php the_field('spouse'); ?>" /><?php the_title(); ?></a>


            <?php endforeach; ?>

            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
        <?php 

        $posts = get_field('sibling');

        if( $posts ): ?>

            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>

                    <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><link itemprop="sibling" href="<?php the_field('sibling'); ?>" /><?php the_title(); ?></a>


            <?php endforeach; ?>

            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
        <?php 

        $posts = get_field('children');

        if( $posts ): ?>

            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>

                    <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><link itemprop="children" href="<?php the_field('children'); ?>" /><?php the_title(); ?></a>


            <?php endforeach; ?>

            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
        <?php 

        $posts = get_field('knows');

        if( $posts ): ?>

            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>

                    <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><link itemprop="knows" href="<?php the_field('knows'); ?>" /><?php the_title(); ?></a>


            <?php endforeach; ?>

            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>

<?php echo '</div></section>';

}?>
<?php
        // fetch taxonomy terms for current product
        $productterms = get_the_terms( get_the_ID(), 'letterature'  );
         
        if( $productterms ) {
             
            $producttermnames[] = 0;
                     
            foreach( $productterms as $productterm ) {  
                 
                $producttermnames[] = $productterm->name;
             
            }
             
                         
            // set up the query arguments
            $args = array (
                'post_type' => 'autori',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'letterature',
                        'field'    => 'slug',
                        'terms'    => $producttermnames,
                    ),
                ),
            );
             
            // run the query
            $query = new WP_Query( $args ); 
 
            if( $query->have_posts() ) { ?>
                 
                <section id="autorisimili" class="product-related-posts widget widget_archive">
             
                <?php echo '<h2 class="widget-title">' . __( 'Autori simili' ) . '</h2>'; ?>
             
                <div class="list-group">
             
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                     
                        <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><?php the_title(); ?></a>
                             
                        <?php endwhile; ?>
                         
                        <?php wp_reset_postdata(); ?>
                     
                </div>
                     
                </section>
                 
            <?php }
             
         
        }
        ?>