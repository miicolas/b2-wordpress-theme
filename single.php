<?php get_header(); ?>
  <div class="container page-sidebar">
    <main>
      <header class="news-single__header">
        <div class="news-single__title"><?php the_title(); ?></div>
        <div class="news-single__meta">
            <?php $categories = get_the_category();
            
            if (!empty($categories)) 

            ?>
        <a class="news__tag" href="<?php get_term_link($categories[0])?>"><?php echo $categories[0]->name; ?></a> 
        <div class="news__date"><?php the_time('d/m/Y'); ?></div>
        </div>
      </header>
      <div class="formatted">
        <p>
          <?php the_post_thumbnail() ; ?>
          <?php the_content(); ?>
        
          <p>
      </div>

      <div class="comments">
            <a href="#comments"><i class='fa fa-comment'></i><?php comments_number(); ?></a>
            <?php comments_template(); ?>
    
        </div>


    </main>
    <aside class="sidebar">
    <?php dynamic_sidebar('blog_sidebar'); ?>
</aside>

  </div>



<?php get_footer(); ?>