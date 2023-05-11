<?php
declare(strict_types=1);

class Walker_Category_And_Post extends Walker_Category {

    public function start_el( &$output, $category, $depth = 0, $args = array(), $current_object_id = 0 ) {

        $link = '<strong><a href="' . get_term_link( $category ) . '">' . $category->name . '</a></strong>';
        $output .= "\t<li>$link\n";

        $output .= $this->category_post_list( $category->cat_ID );
    }

    private function category_post_list( int $category ): string
    {
        $posts_in_category = get_posts( array( 'category' => $category, 'numberposts' => -1 ) );

        $html = '<ul>';

        foreach( $posts_in_category as $post ) {
            $html .= '<li>';
            $html .= '<a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a>' ;
            $html .= '</li>';
        }

        $html .= '</ul>';

        return $html;
    }
}
