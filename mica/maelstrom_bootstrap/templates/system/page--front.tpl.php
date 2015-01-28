<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<div class="wrapper">
<!--=== Header ===-->
<div class="header">
  <!-- Topbar -->
<!--  <div class="topbar">-->
<!--    <div class="container">-->
<!--       Topbar Navigation -->
<!--      <ul class="loginbar pull-right">-->
<!--        <li class="languagesSelector">-->
<!--          <i class="fa fa-globe"></i>-->
<!--          <a>Languages</a>-->
<!--          <ul class="languages">-->
<!--            <li class="active">-->
<!--              <a href="#">English <i class="fa fa-check"></i></a>-->
<!--            </li>-->
<!--            <li><a href="#">Spanish</a></li>-->
<!--            <li><a href="#">Russian</a></li>-->
<!--            <li><a href="#">German</a></li>-->
<!--          </ul>-->
<!--        </li>-->
<!--        <li class="topbar-devider"></li>-->
<!--        <li><a href="page_faq.html">Help</a></li>-->
<!--        <li class="topbar-devider"></li>-->
<!--        <li><a href="page_login.html">Login</a></li>-->
<!--      </ul>-->
<!--       End Topbar Navigation -->
<!--    </div>-->
<!--  </div>-->
  <!-- End Topbar -->

  <!-- Navbar -->
  <div class="navbar navbar-default mega-menu" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <?php if ($logo): ?>
          <a class="navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
            <img id="logo-header" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>">
          </a>
        <?php endif; ?>
        <?php if (!empty($site_name)): ?>
          <a class="name navbar-brand" href="<?php print $front_page; ?>"
            title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
        <?php endif; ?>
        <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
          <nav role="navigation">
            <?php if (!empty($primary_nav)): ?>
              <?php print render($primary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($secondary_nav)): ?>
              <?php print render($secondary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($page['navigation'])): ?>
              <?php print render($page['navigation']); ?>
            <?php endif; ?>
          </nav>
        </div>
      <?php endif; ?>
      <!--/navbar-collapse-->
    </div>
  </div>
  <!-- End Navbar -->

</div>
<!--=== End Header ===-->
<?php print render($page['header']); ?>

<!--=== Content Part ===-->

<!--=== Slider ===-->
<div class="tp-banner-container">
  <div class="tp-banner">
    <ul>
      <!-- SLIDE -->
      <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000"
        data-title="Title 1">
        <!-- MAIN IMAGE -->
        <img src="<?php print $directory; ?>/img/sliders/1.jpg" alt="darkblurbg"
          data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

        <div class="tp-caption revolution-ch1 sft start"
          data-x="center"
          data-hoffset="0"
          data-y="100"
          data-speed="1500"
          data-start="500"
          data-easing="Back.easeInOut"
          data-endeasing="Power1.easeIn"
          data-endspeed="300">
          Introducing Unify Template
        </div>

        <!-- LAYER -->
        <div class="tp-caption revolution-ch2 sft"
          data-x="center"
          data-hoffset="0"
          data-y="190"
          data-speed="1400"
          data-start="2000"
          data-easing="Power4.easeOut"
          data-endspeed="300"
          data-endeasing="Power1.easeIn"
          data-captionhidden="off"
          style="z-index: 6">
          We are creative technology company providing <br/>
          key digital services on web and mobile.
        </div>

        <!-- LAYER -->
        <div class="tp-caption sft"
          data-x="center"
          data-hoffset="0"
          data-y="310"
          data-speed="1600"
          data-start="2800"
          data-easing="Power4.easeOut"
          data-endspeed="300"
          data-endeasing="Power1.easeIn"
          data-captionhidden="off"
          style="z-index: 6">
          <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-light">Learn More</a>
        </div>
      </li>
      <!-- END SLIDE -->

      <!-- SLIDE -->
      <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000"
        data-title="Title 2">
        <!-- MAIN IMAGE -->
        <img src="<?php print $directory; ?>/img/sliders/2.jpg" alt="darkblurbg"
          data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

        <div class="tp-caption revolution-ch1 sft start"
          data-x="center"
          data-hoffset="0"
          data-y="100"
          data-speed="1500"
          data-start="500"
          data-easing="Back.easeInOut"
          data-endeasing="Power1.easeIn"
          data-endspeed="300">
          Includes 160+ Template Pages
        </div>

        <!-- LAYER -->
        <div class="tp-caption revolution-ch2 sft"
          data-x="center"
          data-hoffset="0"
          data-y="190"
          data-speed="1400"
          data-start="2000"
          data-easing="Power4.easeOut"
          data-endspeed="300"
          data-endeasing="Power1.easeIn"
          data-captionhidden="off"
          style="z-index: 6">
          We are creative technology company providing <br/>
          key digital services on web and mobile.
        </div>

        <!-- LAYER -->
        <div class="tp-caption sft"
          data-x="center"
          data-hoffset="0"
          data-y="310"
          data-speed="1600"
          data-start="2800"
          data-easing="Power4.easeOut"
          data-endspeed="300"
          data-endeasing="Power1.easeIn"
          data-captionhidden="off"
          style="z-index: 6">
          <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-light">Learn More</a>
        </div>
      </li>
      <!-- END SLIDE -->

      <!-- SLIDE -->
      <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000"
        data-title="Title 3">
        <!-- MAIN IMAGE -->
        <img src="<?php print $directory; ?>/img/sliders/3.jpg" alt="darkblurbg"
          data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

        <div class="tp-caption revolution-ch1 sft start"
          data-x="center"
          data-hoffset="0"
          data-y="100"
          data-speed="1500"
          data-start="500"
          data-easing="Back.easeInOut"
          data-endeasing="Power1.easeIn"
          data-endspeed="300">
          Over 12000+ Satisfied Users
        </div>

        <!-- LAYER -->
        <div class="tp-caption revolution-ch2 sft"
          data-x="center"
          data-hoffset="0"
          data-y="190"
          data-speed="1400"
          data-start="2000"
          data-easing="Power4.easeOut"
          data-endspeed="300"
          data-endeasing="Power1.easeIn"
          data-captionhidden="off"
          style="z-index: 6">
          We are creative technology company providing <br/>
          key digital services on web and mobile.
        </div>

        <!-- LAYER -->
        <div class="tp-caption sft"
          data-x="center"
          data-hoffset="0"
          data-y="310"
          data-speed="1600"
          data-start="2800"
          data-easing="Power4.easeOut"
          data-endspeed="300"
          data-endeasing="Power1.easeIn"
          data-captionhidden="off"
          style="z-index: 6">
          <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-light">Learn More</a>
        </div>
      </li>
      <!-- END SLIDE -->
    </ul>
    <div class="tp-bannertimer tp-bottom"></div>
  </div>
</div>
<!--=== End Slider ===-->

<!--=== Content Part ===-->
<div class="container content">
  <div class="margin-bottom-10"></div>
  <!--Title Box-->
  <div class="title-box">
    <div class="title-box-text">We <span class="color-green">Do</span> Awesome Design</div>
    <p>Creative freedom matters user experience, we minimize the gap between technology and its audience.</p>
  </div>
  <!-- End Promo Box -->
  <!-- Promo Box -->
  <div class="row">
    <div class="col-md-4">
      <div class="promo-box">
        <i class="fa fa-bullhorn color-blue"></i>
        <strong>Creative Freedom Experience</strong>

        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium qui officia deserunt
          mollitia anim</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="promo-box">
        <i class="fa fa-bolt color-orange"></i>
        <strong>Dedicated Advanced Team</strong>

        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium qui officia deserunt
          mollitia anim</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="promo-box">
        <i class="fa fa-rocket color-sea"></i>
        <strong>We Do Things With Love</strong>

        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium qui officia deserunt
          mollitia anim</p>
      </div>
    </div>
  </div>
  <!-- End Promo Box -->

  <!-- Info Blokcs -->
  <div class="row margin-bottom-20">
    <!-- Welcome Block -->
    <div class="col-md-8 md-margin-bottom-40">
      <div class="headline"><h3>Latest Projects</h3></div>
      <div id="myCarousel" class="carousel slide carousel-v1" data-interval="500">
        <div class="carousel-inner">
          <div class="item active">
            <img src="<?php print $directory; ?>/img/main/5.jpg" alt="">

            <div class="carousel-caption">
              <p>Facilisis odio, dapibus ac justo acilisis gestinas.</p>
            </div>
          </div>
          <div class="item">
            <img src="<?php print $directory; ?>/img/main/4.jpg" alt="">

            <div class="carousel-caption">
              <p>Cras justo odio, dapibus ac facilisis into egestas.</p>
            </div>
          </div>
          <div class="item">
            <img src="<?php print $directory; ?>/img/main/3.jpg" alt="">

            <div class="carousel-caption">
              <p>Justo cras odio apibus ac afilisis lingestas de.</p>
            </div>
          </div>
        </div>

        <div class="carousel-arrow">
          <a class="left carousel-control" href="" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right carousel-control" href="" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </div>
    </div>
    <!--/col-md-8-->

    <!-- Latest Shots -->
    <div class="col-md-4 md-margin-bottom-20 posts">
      <div class="headline"><h3>Recent Entries</h3></div>
      <dl class="dl-horizontal">
        <dt><a href="#"><img alt=""
              src="<?php print $directory; ?>/img/sliders/elastislide/6.jpg"></a>
        </dt>
        <dd>
          <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap Template</a></p>
        </dd>
      </dl>
      <dl class="dl-horizontal">
        <dt><a href="#"><img alt=""
              src="<?php print $directory; ?>/img/sliders/elastislide/10.jpg"></a>
        </dt>
        <dd>
          <p><a href="#">Lorem sequat ipsum dolor lorem sit amet, consectetur adipiscing dolor elit.</a></p>
        </dd>
      </dl>
      <dl class="dl-horizontal">
        <dt><a href="#"><img alt=""
              src="<?php print $directory; ?>/img/sliders/elastislide/11.jpg"></a>
        </dt>
        <dd>
          <p><a href="#">It works on all major web browsers, tablets and lorem sequat ipsum dolor.</a></p>
        </dd>
      </dl>

    </div>
    <!--/col-md-4-->
  </div>
  <!--/row-->
  <!-- End Info Blokcs -->
</div>
<!--/container-->
<!-- End Content Part -->
<!--/container-->
<!--==== Content -->

<!--==== End Content -->
<!--=== Footer Version 1 ===-->
<div class="footer-v1">
  <div class="footer">
    <?php print render($page['footer']); ?>
  </div>
  <!--/footer-->

  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p>
            2014 &copy; All Rights Reserved.
            <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
          </p>
        </div>

        <!-- Social Links -->
        <div class="col-md-6">
          <ul class="footer-socials list-inline">
            <li>
              <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title=""
                data-original-title="Facebook">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title=""
                data-original-title="Skype">
                <i class="fa fa-skype"></i>
              </a>
            </li>
            <li>
              <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title=""
                data-original-title="Google Plus">
                <i class="fa fa-google-plus"></i>
              </a>
            </li>
            <li>
              <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title=""
                data-original-title="Linkedin">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
            <li>
              <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title=""
                data-original-title="Pinterest">
                <i class="fa fa-pinterest"></i>
              </a>
            </li>
            <li>
              <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title=""
                data-original-title="Twitter">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title=""
                data-original-title="Dribbble">
                <i class="fa fa-dribbble"></i>
              </a>
            </li>
          </ul>
        </div>
        <!-- End Social Links -->
      </div>
    </div>
  </div>
  <!--/copyright-->
</div>
<!--=== End Footer Version 1 ===-->
</div><!--/wrapper-->

<script type="text/javascript">
  jQuery(document).ready(function () {
    App.init();
    App.initSliders();
    RevolutionSlider.initRSfullWidth();
    jQuery('a[data-slide="prev"]').click(function() {
      jQuery('#myCarousel').carousel('prev');
    });

    jQuery('a[data-slide="next"]').click(function() {
      jQuery('#myCarousel').carousel('next');
    });
  });
</script>
<!--[if lt IE 9]>
<script src="<?php print $directory; ?>/plugins/respond.js"></script>
<script src="<?php print $directory; ?>/plugins/html5shiv.js"></script>
<script src="<?php print $directory; ?>/js/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->