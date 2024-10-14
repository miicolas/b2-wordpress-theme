<?php get_header(); ?>

<div class="container">

    <h1 class="page-title"><?php single_post_title(); ?></h1>   

    <div class="page-sidebar">
      <div>
        <div class="news-list">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                <article class="news">
                    <?php (has_post_thumbnail()); ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="news__image">
                    <div class="news__image-container">
                        <?php the_post_thumbnail() ; ?>
                    </div>
                </a>
                <div class="news__body">
                    <header class="news__header">
                        <?php $categories = get_the_category();
                        
                        if (!empty($categories)) 

                        ?>

                    <a class="news__tag" href="<?php get_term_link($categories[0])?>"><?php echo $categories[0]->name; ?></a> 
                        
                    <a class="news__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="news__date"><?php the_time('d/m/Y'); ?></div>
                    </header>
                    <div class="news__content">
                    <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="news__action">
                    Lire la suite
                    <svg class="icon">
                        <use xlink:href="sprite.14d9fd56.svg#arrow"></use>
                    </svg>
                    </a>
                </div>
                </article>
                <?php endwhile; ?>
          
        <?php else : ?>
            <p>Aucune actualité à afficher.</p>
        <?php endif; ?>
        </div>
      </div>
      
      <aside class="sidebar">
        <?php dynamic_sidebar('blog_sidebar'); ?>
  
  
  
</aside>

    </div>
  </div>

<?php get_footer(); ?>