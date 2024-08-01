<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title>BLOGS</title>
    <link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body class="bg-info">
    <header>
        <h1 class="text-center mt-4">BLOGS</h1>
    </header>

    <div class="container">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10, 
            'paged' => $paged
        );
        $query = new WP_Query($args);

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post(); ?>
                <div class="card mb-3">
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    </div>
                </div>
            <?php endwhile;

           
            $total_pages = $query->max_num_pages;
            if ($total_pages > 1) {
                $current_page = max(1, get_query_var('paged'));

            
                echo paginate_links(array(
                   
                    'current' => $current_page,
                    'total' => $total_pages,
                   
                    ));
                '</div>';
            }

        else
            echo '<p>No content found</p>';
        endif;

        wp_reset_postdata();
        ?>
    </div>

    <footer class="text-center mt-4 fw-bold">
        Made by Heli
    </footer>
    <?php wp_footer(); ?>
</body>

</html>
