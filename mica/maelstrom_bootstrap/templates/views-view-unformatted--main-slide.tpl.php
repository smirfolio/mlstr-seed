<?php // dpm($rows); ?>
<div class="tp-banner-container">
  <div class="tp-banner">
    <ul>
      <?php foreach ($rows as $key => $row): ?>
        <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000"
          data-title="Title <?php print $key; ?>">
          <?php print render($row); ?>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class="tp-bannertimer tp-bottom"></div>
  </div>

