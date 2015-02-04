<!--=== Footer Version 1 ===-->
    <div class="container">
      <div class="row">
        <!-- About -->
        <div class="col-md-3 md-margin-bottom-40">
          <img src="<?php print base_path();?><?php print path_to_theme();?>/maelstrom-logo-wihte.png" width="100">
          <?php if (!empty($page['footer_col_1'])): ?>
            <?php print render($page['footer_col_1']); ?>
          <?php endif; ?>
        </div><!--/col-md-3-->
        <!-- End About -->

        <!-- Latest -->
        <div class="col-md-3 md-margin-bottom-40">
          <div class="posts">
            <?php if (!empty($page['footer_col_2'])): ?>
              <?php print render($page['footer_col_2']); ?>
            <?php endif; ?>
          </div>
        </div><!--/col-md-3-->
        <!-- End Latest -->

        <!-- Link List -->
        <div class="col-md-3 md-margin-bottom-40">
          <?php if (!empty($page['footer_col_3'])): ?>
            <?php print render($page['footer_col_3']); ?>
          <?php endif; ?>
        </div><!--/col-md-3-->
        <!-- End Link List -->

        <!-- Address -->
        <div class="col-md-3 map-img md-margin-bottom-40">
          <?php if (!empty($page['footer_col_4'])): ?>
            <?php print render($page['footer_col_4']); ?>
          <?php endif; ?>
        </div><!--/col-md-3-->
        <!-- End Address -->
      </div>
    </div>