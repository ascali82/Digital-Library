<?php
// Bootstrap breadcrumbs
function the_breadcrumb() {
    $show_current   = 1; // 1 - show current page title, 0 - don't show
    global $post;
    global $wp_query;
    $parent_id      = ($post) ? $post->post_parent : '';
    $frontpage_id   = get_option('page_on_front');
// NON MOSTRA LE BREADCRUMBS IN HOME PAGE
if ( !is_front_page() ) {
    echo '<nav class="bg-white" aria-label="breadcrumb">';
    echo '<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';
    echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="';
    echo home_url();
    echo '">';
    echo '<span itemprop="name">Home</span>';
    echo '</a><meta itemprop="position" content="1" /></li>';
    // MOSTRA IL TITOLO DELLA PAGINA NELLA HOME BLOG
    if (is_home()){ // FUNZIONA (MA è MIGLIORABILE)
        global $post;
        $page_for_posts_id = get_option('page_for_posts');
        if ( $page_for_posts_id ) { 
            $post = get_page($page_for_posts_id);
            setup_postdata($post); ?>
            <li class="breadcrumb-item active"> 
            <?php the_title(); ?>
            </li> 
            <?php rewind_posts();
        }
    } // MOSTRA IL LINK ALLA HOME BLOG IN OGNI POST 
    elseif ( is_single() && !is_attachment() && !is_custom_post_type() ) { // FUNZIONA
        /** Cancellare la parte da echo in poi se non si vuole la blog base o modificare l'url della stessa */
        echo '<li class="breadcrumb-item"><a href="'.get_site_url().'/bacheca">Bacheca</a></li><li class="breadcrumb-item active">';the_title();'</li>';
    } // MOSTRA IL LINK ALLA HOME BLOG E AL POST PARENT
    elseif ( is_attachment() ) { // FUNZIONA
        $parent = get_post($post->post_parent);
        $permalink = get_permalink( $current_attachment->post_parent );
        $parent_title = get_post( $current_attachment->post_parent )->post_title;
        /** Cancellare la parte da echo in poi se non si vuole la blog base o modificare l'url della stessa */
        echo '<li class="breadcrumb-item"><a href="'.get_site_url().'/bacheca">Bacheca</a></li><li class="breadcrumb-item"><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
        echo '<li class="breadcrumb-item active">';the_title();'</li>';
    } // MOSTRA LE PAGINE PARENT SE CI SONO ALTRIMENTI SOLO LA PAGINA CORRENTE 
    elseif ( is_page()){ // FUNZIONA
        if ( $parent_id ) { 
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf('<li class="breadcrumb-item"><a href="%s">%s</a></li>', esc_url( get_permalink($page->ID) ), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                }
            } echo '<li class="breadcrumb-item active">';the_title();'</li>';
        } else {
            echo '<li class="breadcrumb-item active">';the_title();'</li>';
        }
    } // MOSTRA LE CATEGORIE PARENT SE CI SONO ALTRIMENTI SOLO LA CATEGORIA CORRENTE
     elseif (is_category()) {
        if ( $term_ids = get_ancestors( get_queried_object_id(), 'category', 'taxonomy') ) { //FUNZIONA [Da testare con tax]
            $crumbs = [];
            foreach ( $term_ids as $term_id ) {
                $term = get_term( $term_id, 'category' );
                if ( $term && ! is_wp_error( $term ) ) {
                    $crumbs[] = sprintf( '<li class="breadcrumb-item"><a href="%s">%s</a></li>', esc_url( get_term_link( $term ) ), esc_html( $term->name ) );
                    } 
                }
                echo implode( array_reverse( $crumbs ) );
                echo '<li class="breadcrumb-item active">';single_cat_title();'</li>'; 
        } else //FUNZIONA
        echo '<li class="breadcrumb-item active">';single_cat_title();'</li>'; 
    } // GESTISCE LA PAGINA 404
     elseif ( is_404() ) { //FUNZIONA
        echo '<li class="breadcrumb-item active">404 - Pagina non trovata</li>';
    } // GESTISCE L'ARCHIVIO TAG
     elseif (is_tag()) { //FUNZIONA
        echo "<li class='breadcrumb-item active'>Tag: "; single_tag_title(); echo'</li>';
    }
    elseif (is_day()) {
        echo"<li class='breadcrumb-item'>Archive for "; the_time('F jS, Y'); echo'</li>';
    }
    elseif (is_month()) {
        echo"<li class='breadcrumb-item'>Archive for "; the_time('F, Y'); echo'</li>';
    }
    elseif (is_year()) {
        echo"<li class='breadcrumb-item'>Archive for "; the_time('Y'); echo'</li>';
    }
    elseif (is_author()) {
        echo"<li class='breadcrumb-item'>Author Archive"; echo'</li>';
    }
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { // NON FUNZIONA
        echo "<li>Blog Archives"; echo'</li>';}
    // GESTISCE LA PAGINA RISULTATI DI RICERCA
    elseif (is_search()) { //FUNZIONA
        echo"<li class='breadcrumb-item'>";printf( esc_html__( 'Risultati di ricerca per: %s', '_digital_library' ), '<span>' . get_search_query() . '</span>' ); echo'</li>';
    } if ( is_singular( 'version' ) ) {
//    elseif ( is_single() && !is_custom_post_type( 'version' ) ) {
        echo '<li class="breadcrumb-item"><a href="'.get_site_url().'/versioni">Versioni</a></li><li class="breadcrumb-item active">';the_title();'</li>';
    } elseif ( is_singular( 'autori' ) )  {
        echo '<li class="breadcrumb-item"><a href="'.get_site_url().'/autori">Autori</a></li><li class="breadcrumb-item active">';the_title();'</li>';
    } elseif ( is_singular( 'opere' ) )  {
        echo '<li class="breadcrumb-item"><a href="'.get_site_url().'/opere">Opere</a></li><li class="breadcrumb-item active">';the_title();'</li>';
    } elseif ( is_tax('letterature' ) )  {// MANCANO CPT E TAX
        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

        // Create a list of all the term's parents
        $parent = $term->parent;
        while ($parent):
        $parents[] = $parent;
        $new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
        $parent = $new_parent->parent;
        endwhile;
        if(!empty($parents)):
        $parents = array_reverse($parents);
        
        // For each parent, create a breadcrumb item
        foreach ($parents as $parent):
        $item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
        $url = home_url().'/'.$item->taxonomy.'/'.$item->slug;
        echo '<li class="breadcrumb-item"><a href="'.$url.'">'.$item->name.'</a></li>';
        endforeach;
        endif;
        
        // Display the current term in the breadcrumb
        echo '<li class="breadcrumb-item"><a href="'.get_site_url().'/letterature">Letterature</a></li><li class="breadcrumb-item active">'.$term->name.'</li>';
       
    }
}

echo '</ol>';
echo '</nav>';
}