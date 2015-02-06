<?php //dpm($rows); ?>
<div class="team headline"><h2><?php print t('Research Team') ?> </h2></div>

<?php foreach ($rows as $key => $row): ?>
  <?php if (is_int($key / 4) || ($key / 4) == 0): ?>
    <div class="row team margin-bottom-20">
    <?php $nbr_column = 0 ?>
  <?php endif ?>
  <div class="col-sm-12 col-md-3 margin-top-25">
    <?php print render($row); ?>
    <?php ++$nbr_column ?>
  </div>
  <?php if ($nbr_column == 4): ?>
    </div>
  <?php endif ?>
<?php endforeach; ?>
