<?php
/**
 * Porzione di template per la visualizzazione della Mappa del sito
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _incubation
 */
?>
                                    <h2 id="pages">Pagine</h2>
                                        <ul>
                                            <?php // Add pages you'd like to exclude in the exclude here 
                                                wp_list_pages( array( 'exclude' => '',
                                                'title_li' => '',
                                              )
                                            );
                                                wp_list_categories ( array( 'exclude' => '',
                                                'title_li' => '',
                                              )
                                            );
                                              get_post_type_archive_link( array( 'exclude' => '',
                                              'title_li' => '',
                                            )
                                          );
                                            ?>
                                        </ul>

                                    <h2 id="authors">Contributori</h2>
                                        <ul>
                                            <?php wp_list_authors( array( 'exclude_admin' => false,
                                              )
                                            );
                                            ?>
                                        </ul>