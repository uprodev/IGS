<!doctype html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header>
    <div class="top-line">
      <div class="container">
        <div class="row">
          <div class="content d-flex justify-content-between align-items-center">

            <?php if ($field = get_field('logo_h', 'option')): ?>
              <div class="logo-wrap">
                <a href="<?= get_home_url() ?>">
                  <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
                    <img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
                  <?php else: ?>
                    <?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'logo_mob')) ?>
                  <?php endif ?>
                </a>
              </div>
            <?php endif ?>
            
            <nav class="top-menu d-flex justify-content-between align-items-center">

              <?php wp_nav_menu( array(
                'theme_location'  => 'header',
                'container'       => '',
                'items_wrap'      => '<ul class="d-lg-flex justify-content-between align-items-center">%3$s</ul>'
              )); ?>

              <?php if ($field = get_field('link_h', 'option')): ?>
                <div class="btn-wrap">
                  <a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                </div>
              <?php endif ?>

            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="menu-responsive" id="menu-responsive" style="display: none">
    <div class="wrap">

      <?php if ($field = get_field('logo_h', 'option')): ?>
        <div class="logo-wrap">
          <a href="<?= get_home_url() ?>">
            <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
              <img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
            <?php else: ?>
              <?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'logo_mob')) ?>
            <?php endif ?>
          </a>
        </div>
      <?php endif ?>

      <nav class="mob-menu-wrap">

        <?php wp_nav_menu( array(
          'theme_location'  => 'header',
          'container'       => '',
          'items_wrap'      => '<ul class="mob-menu p-0">%3$s</ul>'
        )); ?>

      </nav>
    </div>
  </div>

  <div class="menu-bar">
    <div class="wrap-btn">
      <a href="#" class="open-menu">
        <span class="wrap">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <b><?php _e('menu', 'IGS') ?></b>
      </a>
    </div>

    <?php if ($field = get_field('link_h', 'option')): ?>
      <div class="btn-wrap">
        <a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
      </div>
    <?php endif ?>

    <?php if (($field = get_field('button_h', 'option')) && checkArrayForValues($field) && $field['link']): ?>
    <div class="btn-tel">
      <a href="<?= $field['link']['url'] ?>"<?php if($field['link']['target']) echo ' target="_blank"' ?>>

        <?php if ($field['icon']): ?>
          <i class="<?= $field['icon'] ?>"></i>
        <?php endif ?>
        
        <b><?= $field['link']['title'] ?></b>
      </a>
    </div>
  <?php endif ?>
  
</div>

<main>