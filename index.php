<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title>BLOGS</title>
    <?php wp_head(); ?>
</head>

<body class="bg-secondary">
    <header>
        <h1 class="text-center fw-bold p-3 bg-dark text-white">BLOGS</h1>
    </header>

    <div class="container">
        <div class="row">
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
                    <div class="col-md-3 mb-4 mt-4">
                        <div class="card h-100">
                            <?php if (has_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                <div class="col-12">
                    <div class="pagination justify-content-center">
                        <?php
                        $total_pages = $query->max_num_pages;
                        if ($total_pages > 1) {
                            $current_page = max(1, get_query_var('paged'));

                            echo paginate_links(array(
                                'current' => $current_page,
                                'total' => $total_pages,
                            ));
                        }
                        ?>
                    </div>
                </div>

            <?php else: ?>
                <div class="col-12">
                    <p>No content found</p>
                </div>
            <?php endif;

            wp_reset_postdata();
            ?>
        </div>
    </div>

    <footer class="text-center mt-4 fw-bold p-3 bg-dark text-white">
        Made by Heli
    </footer>

    <?php wp_footer(); ?>
</body>

</html>
