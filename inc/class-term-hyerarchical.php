<?php
    class Walker_Quickstart extends Walker {

        // Tell Walker where to inherit it's parent and id values
        var $db_fields = array(
            'parent' => 'parent', 
            'id'     => 'term_id' 
        );
    
        /**
         * At the start of each element, output a <p> tag structure.
         */
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $output .= sprintf( '<td data-text="22"><a href="' . get_term_link( $item->slug, 'letterature' ) . '">%s %s</a></td>',
                str_repeat('', $depth),
                $item->name
//                $item->term_id            
            );
        }
    
    }?> 