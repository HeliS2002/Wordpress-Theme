<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title>BLOGS</title>

    <link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body class="bg-secondary">

    <div>
        <?php
        if (have_posts()):
            while (have_posts()):
                the_post(); ?>
               <article class="card mb-4 shadow-sm">
    <?php if (has_post_thumbnail()): ?>
        <img class="card-img-top" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
    <?php endif; ?>
    <div class="card-body bg-dark text-white">
        <h2 class="card-title text-center fw-bold"><?php the_title(); ?></h2>
        <div class="card-text">
            <?php the_content(); ?>
        </div>
    </div>
</article>

            <?php endwhile;
        else:
            echo '<p>No content found</p>';
        endif;
        ?>

    </div>
<?php wp_footer(); ?>
</body>
</html>
