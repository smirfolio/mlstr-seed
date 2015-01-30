<?php // dpm($rows); ?>

<div class="headline"><h3>Recent Entries</h3></div>

<?php foreach ($rows as $key => $row): ?>
  <dl class="dl-horizontal">

    <?php print $row; ?>

  </dl>
<?php endforeach; ?>

