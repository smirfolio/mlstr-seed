<?php //dpm($rows); ?>
<div class="team headline"><h2><?php print t('Principal Investigators')?> </h2></div>
<div class="row team margin-bottom-20">
  <?php foreach ($rows as $key => $row): ?>
  <div class="col-sm-12 col-md-3 margin-top-25 pull-right">
      <?php print render($row); ?>
  </div>
  <?php endforeach; ?>
</div>