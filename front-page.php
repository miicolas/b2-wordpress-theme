<?php get_header(); ?>

<?php while(have_posts()) : the_post(); ?>

  <main class="sections">
    <!-- Find your home -->
    <section>
      <div class="container">
        <div class="search-form">
  <h1 class="search-form__title"><?php the_title(); ?></h1>
  <div><?php the_content(); ?></div>
  <hr>
  <form action="listing.html" class="search-form__form">
    <div class="search-form__checkbox">
      <div class="form-check form-check-inline">
        <input class="form-check-input" checked="" type="radio" name="type" id="buy" value="buy">
        <label class="form-check-label" for="buy">Acheter</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="type" id="rent" value="rent">
        <label class="form-check-label" for="rent">Louer</label>
      </div>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="city" placeholder="Montpellier">
      <label for="city">Ville</label>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" id="budget" placeholder="100 000 €">
      <label for="budget">Prix max</label>
    </div>
    <div class="form-group">
      <select name="kind" id="kind" class="form-control">
        <option value="flat">Appartement</option>
        <option value="villa">Villa</option>
      </select>
      <label for="kind">Type</label>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" id="rooms" placeholder="4">
      <label for="rooms">Pièces</label>
    </div>
    <button type="submit" class="btn btn-filled">Rechercher</button>
  </form>
</div>

      </div>
      <?php if ($property = get_field('highlighted')): ?>

        
      <div class="highlighted highlighted--home">
        <div>
            <?= get_the_post_thumbnail($property); ?>
        </div>
        <div class="highlighted__body">
          <div class="highlighted__title"><?php the_field('title',$property); ?></div>
          <div class="highlighted__price"><?php the_field('price', $property) ?> €</div>
          <div class="highlighted__location"><?php the_field('location', $property) ?></div>
          <div class="highlighted__space"><?php the_field('surface', $property) ?>m²</div>

        </div>
      </div>
      <?php endif; ?>
    </section>

    <!-- Feature properties -->
      <?php if (have_rows('last_property')): while(have_rows('last_property')): the_row() ?>
    <section class="container">
      <div class="push-properties">
        <div class="push-properties__title"><?php the_sub_field('title') ?></div>
        <p>
          <?php the_sub_field('description') ?>
        </p>
        <div class="push-properties__grid">
          
          <?php
          $query = new WP_Query([
              'post_type' => 'property',
              'posts_per_page' => 4,
                          'orderby' => 'date',
                          'order' => 'DESC'
                      ]);
              
              while ($query->have_posts()): $query->the_post(); ?>

                  <a class="property" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                      <div class="property__image">
                              
                              
                          <?php the_post_thumbnail('medium'); ?>
                      </div>
                          <div class="property__body">
                              <div class="property__location"><?php the_field('location') ?></div>
                              <h3 class="property__title"><?php the_field('title'); ?></h3>
                              <div class="property__price"><?php the_field('price') ?> €</div>
                          </div>
                      </a>
              <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <div class="highlighted">
          <?= get_the_post_thumbnail($property); ?>
          <div class="highlighted__body">
            <div class="highlighted__title"><?php the_field('title',$property); ?></div>
            <div class="highlighted__price"><?php the_field('price', $property) ?> €</div>
            <div class="highlighted__location"><?php the_field('location', $property) ?></div>
            <div class="highlighted__space"><?php the_field('surface', $property) ?>m²</div>

          </div>
        </div>

        <a class="push-properties__action btn" href="<?= the_permalink($property) ?>">
          Parcourir nos biens
          <svg class="icon">
            <use xlink:href="sprite.14d9fd56.svg#arrow"></use>
          </svg>
        </a>

      </div>
    </section>
      <?php endwhile; endif ?>
    
      <?php if (have_rows('quote')): while(have_rows('quote')): the_row() ?>

    <section class="container quote">
      <div class="quote__title"><?php the_sub_field('title') ?></div>
      <div class="quote__body">
        <div class="quote__image">
          <img src="<?php the_sub_field('picture') ?>" alt="">
          <div class="quote__author"><?php the_sub_field('role') ?></div>
        </div>
        <blockquote>
          <p><?php the_sub_field('content_quote')?></p>
        </blockquote>
      </div>


      <?php if($action = get_sub_field('action')): ?>
      <a class="quote__action btn" href="<?= $action['url'] ?>">
        <?= $action['title']; ?>
        <svg class="icon">
          <use xlink:href="sprite.14d9fd56.svg#arrow"></use>
        </svg>
      </a>
      <?php endif ?>
    </section>
    
    <?php endwhile; endif ?>

    <!-- Read our stories -->
      <?php if (have_rows('last_news')): while(have_rows('last_news')): the_row() ?>
    <section class="container push-news">
      <h2 class="push-news__title"><?php the_sub_field('title') ?></h2>
      <p><?php the_sub_field('description') ?></p>

      <?php 
      $query = new WP_Query([
          'post_type' => 'post',
          'posts_per_page' => 3,
          'orderby' => 'date',
          'order' => 'DESC'
      ]);
      ?>

      <div class="push-news__grid">
        <?php while($query->have_posts()): $query->the_post(); ?>
        <a href="<?php the_permalink() ?>" class="push-news__item">
            <?php if (has_post_thumbnail()) ?>

         
            <?= get_the_post_thumbnail($post); ?>
            
          
          <span class="push-news__tag"><?php the_sub_field('tag') ?></span>
          <h3 class="push-news__label"><?php the_title() ?></h3>
        </a>
        
        
        <?php endwhile; wp_reset_postdata() ?>
      </div>

    </section>
      <?php endwhile; endif ?>

    

  </main>

  <?php endwhile; ?>

<?php get_footer(); ?>

