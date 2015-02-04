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
<!--=== Breadcrumbs ===-->
<?php if (!empty($breadcrumb) || !empty($title)): ?>
  <div class="breadcrumbs  header header-sticky">
    <div class="container">
      <?php if (!empty($breadcrumb)):  print $breadcrumb; endif; ?>
      <?php if (!empty($title)): ?>
        <h1 class="pull-left">
          <?php if (!empty($classes_array['title_page'])) : ?>
            <span
              class="t_badge color_<?php print $classes_array['title_page']; ?> i-obiba-<?php print $classes_array['title_page']; ?>">
          </span>
          <?php endif; ?>
          <?php print $title; ?>
        </h1>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
<!--=== End Breadcrumbs ===-->
<!--=== Content Part ===-->
<!-- Google Map -->
<div id="map" class="map">
</div><!---/map-->
<!-- End Google Map -->
<?php !empty($messages)? print $messages : NULL; ?>
<div class="main-container container content">
  <div class="row margin-bottom-30">
    <div class="col-sm-12 col-md-8 mb-margin-bottom-30">
      <div class="headline"><h2><?php print t('Contact Form') ?></h2></div>
      <?php print render($page['content']); ?>
    </div><!--/col-md-9-->

    <div class="col-sm-12 col-md-4">
      <!-- Contacts -->
      <?php print render($page['contacts_side']); ?>
    </div><!--/col-md-3-->
  </div><!--/row-->
  <div class="row">

    <!--End col-sm-3-->
    <!--====== Content drupal ======-->
    <section<?php print $content_column_class; ?> >


    </section>
    <!--======= End content drupal =====-->

    <!--======= Second Sidebar =====-->
    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>
    <!--======= End Second Sidebar =====-->
    <!-- Fixed side -->
    <div id="fixed-sidebar">
      <div id="sidebar-wrapper" class="side-bar-content sidebar-untoggled"></div>
    </div>
    <!-- /#Fixed side -->
  </div>
  <!--/row-->

</div>
<!--/container-->
<!--==== Content -->

<!--==== End Content -->
<!--=== Footer Version 1 ===-->
<div class="footer-v1">
  <div class="footer">
    <?php include_once path_to_theme().'/templates/footerv1.tpl.php'; ?>
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
    map = new GMaps({
      div: '#map',
      scrollwheel: false,
      lat: 45.496580,
      lng: -73.580104
    });

    var marker = map.addMarker({
      lat: 45.496580,
      lng: -73.580104,
      title: 'Maelstrom Research'
    });
  });
</script>
<!--[if lt IE 9]>
<script src="<?php print $directory; ?>/plugins/respond.js"></script>
<script src="<?php print $directory; ?>/plugins/html5shiv.js"></script>
<script src="<?php print $directory; ?>/js/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->