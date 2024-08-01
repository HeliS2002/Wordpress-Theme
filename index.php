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
        if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <div class="card mb-3">
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            <?php endwhile;
        else:
            echo '<p>No content found</p>';
        endif;
        ?>
    </div>

    <footer class="text-center mt-4 fw-bold">
        Made by Heli
    </footer>
    <?php wp_footer(); ?>
</body>

</html>
