<?php // dpm($rows); ?>
<!-- Info Blokcs -->
<div class="headline"><h3><?php print l('Projects', 'list-projects') ?> </h3></div>
<div id="ProjectsCarousel" class="carousel slide carousel-v1" data-interval="500">
  <div class="carousel-inner">
    <?php foreach ($rows as $key => $row): ?>
      <div class="<?php print $key == 0 ? "item active" : "item"; ?>">
        <?php print $row; ?>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="carousel-arrow">
    <a class="left carousel-control" href="#ProjectsCarousel" data-slide="prev">
      <i class="fa fa-angle-left"></i>
    </a>
    <a class="right carousel-control" href="#ProjectsCarousel" data-slide="next">
      <i class="fa fa-angle-right"></i>
    </a>
  </div>
</div>