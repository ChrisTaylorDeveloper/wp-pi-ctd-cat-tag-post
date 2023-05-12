<?php
declare(strict_types=1);

class Walker_Category_And_Post extends Walker_Category {

    public function start_el( &$output, $category, $depth = 0, $args = array(), $current_object_id = 0 ) {

        $link = '<strong><a href="' . get_term_link( $category ) . '">' . $category->name . '</a></strong>';
        $output .= "\t<li>$link\n";

        $output .= $this->category_post_list( $category->cat_ID );
    }

    private function category_post_list( int $category_id ): string {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'include_children' => false,
                    'field' => 'id',
                    'terms' => $category_id,
                    'operator' => 'IN'
                )
            )
        );

        $query = new WP_Query( $args );

        $html = '<ul>';

        if( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                $html .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>' ;
            }
        }

        wp_reset_postdata();

        $html .= '</ul>';

        return $html;
    }
}
