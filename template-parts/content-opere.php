<?php
/**
 * Parte di template per la visualizzazione dei post Opere nella pagina archivio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _digital_library
 */

?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Person">
                <header class="entry-header">
                    <?php
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title"><span itemprop="name">', '</span></h1>' );
                        else :
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span itemprop="name">', '</span></a></h2>' );
                        endif; 
                    if ( 'post' === get_post_type() ) :
                        ?>
                        <div class="entry-meta list-group">
                        

                            
                        
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </header><!-- .entry-header -->

                <?php _digital_library_post_thumbnail(); ?>

                <div class="entry-content">
                <?php  // echo get_the_term_list( $post->ID, 'letterature', '<ul class="styles"><li>', ',</li><li>', '</li></ul>' );
                            ?>
                        <?php if( get_field('description') ): ?>
                            <p class="lead"><span itemprop="description"><?php the_field('description'); ?></span></p>
                        <?php endif; ?>
                        <?php 
                        $image = get_field('image');
                        if( $image ):
                        
                            // Image variables.
                            $url = $image['url'];
                            $title = $image['title'];
                            $alt = $image['alt'];
                            $caption = $image['caption'];
                        
                            // Thumbnail size attributes.
                            $size = 'thumbnail';
                            $thumb = $image['sizes'][ $size ];
                            $width = $image['sizes'][ $size . '-width' ];
                            $height = $image['sizes'][ $size . '-height' ];
                        
                            // Begin caption wrap.
                            if( $caption ): ?>
                                <div class="wp-caption">
                            <?php endif; ?>
                        
                            <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
                                <img itemprop="image" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" class="float-sm-none float-md-right"/>
                            </a>
                        
                            <?php 
                            // End caption wrap.
                            if( $caption ): ?>
                                <p class="wp-caption-text"><?php echo esc_html($caption); ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <dl class="row">
                            <?php if( get_field('givenname') ): ?>
                                <dt class="col col-lg-4">Nome</dt>
                                <dd class="col col-lg-4"><span itemprop="givenName"><?php the_field('givenname'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?>
                            <?php if( get_field('additionalname') ): ?>
                                <dt class="col col-lg-4">Secondo Nome</dt>
                                <dd class="col col-lg-4"><span itemprop="additionalName"><?php the_field('additionalname'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?>
                            <?php if( get_field('familyname') ): ?>
                                <dt class="col col-lg-4">Cognome</dt>
                                <dd class="col col-lg-4"><span itemprop="familyName"><?php the_field('familyname'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?>
                            <?php if( get_field('alternatename') ): ?>
                                <dt class="col col-lg-4">Alias</dt>
                                <dd class="col col-lg-4"><span itemprop="alternateName"><?php the_field('alternatename'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?>    
                            <?php if( get_field('identifier') ): ?>
                                <dt class="col col-lg-4">Controllo di autorita&#768;</dt>
                                <dd class="col col-lg-4"><a href="<?php the_field('identifier'); ?>"><link itemprop="identifier" href="<?php the_field('identifier'); ?>" />VIAF</a></dd>
                                <div class="w-100"></div>
                            <?php endif; ?>     
                            <?php if( get_field('sameas') ): ?>
                                <dt class="col col-lg-4">Voce Wikipedia</dt>
                                <dd class="col col-lg-4"><a href="<?php the_field('sameas'); ?>"><link itemprop="sameAs" href="<?php the_field('sameas'); ?>" /><?php the_title();?></a></dd>
                                <div class="w-100"></div>
                            <?php endif; ?> 
                            <?php if( get_field('honorificprefix') ): ?>
                                <dt class="col col-lg-4">Prefisso Onorifico</dt>
                                <dd class="col col-lg-4"><span itemprop="honorificPrefix"><?php the_field('honorificprefix'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?> 
                            <?php if( get_field('honorificsuffix') ): ?>
                                <dt class="col col-lg-4">Suffisso Onorifico</dt>
                                <dd class="col col-lg-4"><span itemprop="honorificSuffix"><?php the_field('honorificsuffix'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?>  
                            <?php if( get_field('birthdate') ): ?>
                                <dt class="col col-lg-4">Data di nascita</dt>
                                <dd class="col col-lg-4"><span itemprop="birthDate"><?php the_field('birthdate'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?>
                            <?php if( get_field('birthplace') ): ?>
                                <dt class="col col-lg-4">Luogo di nascita</dt>
                                <dd class="col col-lg-4"><span itemprop="birtPlace"><?php the_field('birthplace'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?>      
                            <?php if( get_field('deathdate') ): ?>
                                <dt class="col col-lg-4">Data della morte</dt>
                                <dd class="col col-lg-4"><span itemprop="deathDate"><?php the_field('deathdate'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?>  
                            <?php if( get_field('deathplace') ): ?>
                                <dt class="col col-lg-4">Luogo della morte</dt>
                                <dd class="col col-lg-4"><span itemprop="deathPlace"><?php the_field('deathplace'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?> 
                            <?php if( get_field('gender') ): ?>
                                <dt class="col col-lg-4">Genere sessuale</dt>
                                <dd class="col col-lg-4"><span itemprop="gender"><?php the_field('gender'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?>
                            <?php if( get_field('nationality') ): ?>
                                <dt class="col col-lg-4">Nazionalita&#768;</dt>
                                <dd class="col col-lg-4"><span itemprop="nationality"><?php the_field('nationality'); ?></span></dd>
                                <div class="w-100"></div>
                            <?php endif; ?>

                        </dl>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php  _digital_library_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-<?php the_ID(); ?> -->