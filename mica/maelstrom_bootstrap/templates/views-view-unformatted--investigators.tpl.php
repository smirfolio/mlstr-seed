<?php //dpm($rows); ?>
<div class="team headline"><h2><?php print t('Principal Investigators')?> </h2></div>
<div class="row team margin-bottom-20">
  <?php foreach ($rows as $key => $row): ?>
  <div class="col-sm-12 col-md-4 margin-top-25">
      <?php print render($row); ?>
  </div>
  <?php endforeach; ?>
</div>