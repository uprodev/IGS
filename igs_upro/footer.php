</main>

<footer>
  <div class="container">
    <div class="row">
      <div class="top d-flex justify-content-between flex-wrap align-items-end">
        <div class="title-wrap">

          <?php if ($field = get_field('subtitle_f', 'option')): ?>
            <h6 class="sub-title-white sub-title"><?= $field ?></h6>
          <?php endif ?>

          <?php if ($field = get_field('title_f', 'option')): ?>
            <h3><?= $field ?></h3>
          <?php endif ?>

        </div>

        <?php if ($field = get_field('button_f', 'option')): ?>
          <div class="btn-wrap">
            <a href="<?= $field['url'] ?>" class="btn-default btn-white"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
          </div>
        <?php endif ?>

      </div>
      <div class="content d-flex justify-content-between flex-wrap">

        <?php if (($field = get_field('contact_info_f', 'option')) && checkArrayForValues($field)): ?>
        <div class="item item-1">

          <?php if ($field['title']): ?>
            <h6><?= $field['title'] ?></h6>
          <?php endif ?>
          
          <?php if ($field['mail_link'] || $field['phone_link']): ?>
            <ul class="contact-list">

              <?php if ($field['mail_link']): ?>
                <li>
                  <a href="<?= $field['mail_link']['url'] ?>"<?php if($field['mail_link']['target']) echo ' target="_blank"' ?>><i class="fa-light fa-envelope"></i><?= $field['mail_link']['title'] ?></a>
                </li>
              <?php endif ?>

              <?php if ($field['phone_link']): ?>
                <li>
                  <a href="<?= $field['phone_link']['url'] ?>"<?php if($field['phone_link']['target']) echo ' target="_blank"' ?>><i class="fa-light fa-phone"></i><?= $field['phone_link']['title'] ?></a>
                </li>
              <?php endif ?>

            </ul>
          <?php endif ?>

          <?= $field['detail_information'] ?>
          
          <?php if ($field['social_icons'] && checkArrayForValues($field['social_icons'])): ?>
            <ul class="soc-list d-flex align-items-center">

              <?php if ($field['social_icons_text']): ?>
                <li><?= $field['social_icons_text'] ?></li>
              <?php endif ?>
              
              <?php foreach ($field['social_icons'] as $item): ?>
                <?php if ($item['icon']): ?>
                  <li>
                    <a href="<?= $item['url'] ?>" target="_blank">

                      <?php if ($item['icon']): ?>
                        <i class="<?= $item['icon'] ?>"></i>
                      <?php endif ?>

                    </a>
                  </li>
                <?php endif ?>
              <?php endforeach ?>
              
            </ul>
          <?php endif ?>
          
        </div>
      <?php endif ?>

      <?php if (($field = get_field('locations_f', 'option')) && checkArrayForValues($field)): ?>
      <div class="item item-2">

        <?php if ($field['title']): ?>
          <h6><?= $field['title'] ?></h6>
        <?php endif ?>
        
        <?php if ($field['locations'] && checkArrayForValues($field['locations'])): ?>
          <?php foreach ($field['locations'] as $item): ?>
            <ul class="address">

              <?= $item['description'] ?>

              <?php if ($item['link']): ?>
                <li>
                  <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
                </li>
              <?php endif ?>

            </ul>
          <?php endforeach ?>
          
        <?php endif ?>
        
      </div>
    <?php endif ?>

    <?php if (($field = get_field('links_column_1_f', 'option')) && checkArrayForValues($field)): ?>
    <div class="item item-3">

      <?php if ($field['title']): ?>
        <h6><?= $field['title'] ?></h6>
      <?php endif ?>

      <?php if ($field['links'] && checkArrayForValues($field['links'])): ?>
        <ul class="list">

          <?php foreach ($field['links'] as $item): ?>
            <?php if ($item['link']): ?>
              <li>
                <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
              </li>
            <?php endif ?>
          <?php endforeach ?>

        </ul>
      <?php endif ?>

    </div>
  <?php endif ?>

  <?php if (($field = get_field('links_column_2_f', 'option')) && checkArrayForValues($field)): ?>
  <div class="item item-4">

    <?php if ($field['title']): ?>
      <h6><?= $field['title'] ?></h6>
    <?php endif ?>

    <?php if ($field['links'] && checkArrayForValues($field['links'])): ?>
      <ul class="list">

        <?php foreach ($field['links'] as $item): ?>
          <?php if ($item['link']): ?>
            <li>
              <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
            </li>
          <?php endif ?>
        <?php endforeach ?>

      </ul>
    <?php endif ?>

  </div>
<?php endif ?>

<?php if (($field = get_field('links_column_3_f', 'option')) && checkArrayForValues($field)): ?>
<div class="item item-5">

  <?php if ($field['title']): ?>
    <h6><?= $field['title'] ?></h6>
  <?php endif ?>

  <?php if ($field['links'] && checkArrayForValues($field['links'])): ?>
    <ul class="list">

      <?php foreach ($field['links'] as $item): ?>
        <?php if ($item['link']): ?>
          <li>
            <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
          </li>
        <?php endif ?>
      <?php endforeach ?>

    </ul>
  <?php endif ?>

</div>
<?php endif ?>

<?php if (($field = get_field('links_mobile_f', 'option')) && checkArrayForValues($field)): ?>
<div class="item item-mob">

  <?php if ($field['title']): ?>
    <h6><?= $field['title'] ?></h6>
  <?php endif ?>

  <?php if ($field['links'] && checkArrayForValues($field['links'])): ?>
    <ul class="list">

      <?php foreach ($field['links'] as $item): ?>
        <?php if ($item['link']): ?>
          <li>
            <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
          </li>
        <?php endif ?>
      <?php endforeach ?>

    </ul>
  <?php endif ?>

</div>
<?php endif ?>

</div>
<div class="bottom d-flex justify-content-between flex-wrap align-items-center">

  <?php if ($field = get_field('bottom_left_f', 'option')): ?>
    <div class="bottom-left"><?= $field ?></div>
  <?php endif ?>
  
  <?php if (($field = get_field('bottom_menu_right_f', 'option')) && checkArrayForValues($field)): ?>
  <div class="bottom-right d-flex justify-content-end flex-wrap">

    <?php if ($field['links'] && checkArrayForValues($field['links'])): ?>
      <ul class="d-flex flex-wrap">

        <?php foreach ($field['links'] as $item): ?>
          <?php if ($item['link']): ?>
            <li>
              <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
            </li>
          <?php endif ?>
        <?php endforeach ?>

      </ul>
    <?php endif ?>
    
    <?= $field['last_link_item'] ?>

  </div>
<?php endif ?>

</div>
</div>
</div>
</footer>

<?php if (!get_field('hide_contact_popup') && !$_COOKIE['is_popup_closed']): ?>
<div class="fix-block">
  <div class="fix-content">

    <?php if ($field = get_field('image_cp', 'option')): ?>
      <figure>
        <?= wp_get_attachment_image($field['ID'], 'full') ?>
      </figure>
    <?php endif ?>
    
    <div class="text">
      <a href="#" class="close-fix"><i class="fa-light fa-xmark"></i></a>

      <?php if ($field = get_field('title_cp', 'option')): ?>
        <h6><?= $field ?></h6>
      <?php endif ?>

      <?php if ($field = get_field('contact_button_cp', 'option')): ?>
        <div class="btn-wrap">
          <a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
        </div>
      <?php endif ?>

    </div>
  </div>
</div>
<?php endif ?>

<?php wp_footer(); ?>
</body>
</html>