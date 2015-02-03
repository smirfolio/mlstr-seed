<?php // dpm($rows); ?>

<div class="headline"><h2><?php print t('Last news') ?> </h2></div>
<ul class="list-unstyled latest-list">
<?php foreach ($rows as $key => $row): ?>

<li>
    <?php print $row; ?>
</li>

<?php endforeach; ?>
</ul>
