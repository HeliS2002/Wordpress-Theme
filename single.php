<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title>BLOGS</title>

    <link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body class="bg-info">

    <div class="container">
        <?php
        if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article>
                    <h2 class="text-center mt-4"><?php the_title(); ?></h2>
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="small-image">
                    <?php endif; ?>
                    <?php the_content(); ?>
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