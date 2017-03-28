<?php
/**
 * PHP Contact form
 *
 * Add basic form validation: required fields & email address valid
 * Sends email to
 */
$email_to = 'YOUR-EMAIL-HERE'; // update to your email
$email_to_name = 'YOUR-NAME-HERE'; // update to your name
$form_message = '<p>Please use the form below to contact us.</p>';
$form_errors = array();
$form_values = $_POST; // Optionally change to $_GET & <form action="contact.php" method="get"> on form
$required_fields = array( // if any of these fields are blank are error will show
  'contact-name' => 'Name',
  'contact-email' => 'Email',
  'contact-message' => 'Message',
);

if (!empty($form_values)) {
  // Form was submitted, validate required fields
  if (!empty($required_fields)) {
    foreach ($required_fields as $required => $label) {
      if (empty($form_values[$required])) {
        $form_errors[$required] = "The $label field is required and cannot be left blank."; //Message to show use
      }
    }
  }
  
  if (!empty($form_values['contact-email'])) {
    // Email address submitted, validate it
    // Remove all illegal characters from email
    $email = filter_var($form_values['contact-email'], FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      // Valid, send email
      require 'assets/plugins/PHPMailer/PHPMailerAutoload.php';
      $mail = new PHPMailer;
      $mail->setFrom($email, $form_values['contact-name']);
      $mail->addAddress($email_to, $email_name);
      $mail->Subject = 'Contact form enquiry from ' . $form_values['contact-name'];
      $email_body = array();
      $email_body[] = '<strong>Email:</strong> ' . $form_values['contact-email'] .'<br />';
      $email_body[] = '<strong>Name:</strong> ' . $form_values['contact-name'] .'<br />';
      $email_body[] = '<strong>Message:</strong> ' . $form_values['contact-message'] .'<br />';
      $email_body[] = 'Email sent at '. date('r', time());
      $mail->msgHTML(implode('<br />', $email_body));
      
      if (!$mail->send()) {
        $form_errors[] = 'Error in sendng enquiry please email us at ' . $email_to . ' instead.';
      }
      else {
        $form_message = '<div class="alert alert-success" role="alert"><strong>Enquiry Successfully sent!</strong> Thank you we will get back to you as soon as possible.</div>';
      }      
    }
    else {
      // Invalid
      $form_errors['contact-email'] = 'The email address inputted is invalid.';
    }
  }
  
  // Make errors into message to user
  if (!empty($form_errors)) {
    $form_message = '<div class="alert alert-danger" role="alert"><strong>Error!</strong> The following errors have occurred submitting the form: <hr />' . implode('<br />', $form_errors) .'</div>';
  }  
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact | AppStrap Bootstrap Theme by Themelize.me</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- @todo: fill with your company info or remove -->
    <meta name="description" content="">
    <meta name="author" content="Themelize.me">
    
    <!-- Bootstrap 4.0.0-alpha.6 CSS via CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    
    <!-- Font Awesome 4.7.0 via CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Plugins required on all pages NOTE: Additional non-required plugins are loaded ondemand as of AppStrap 2.5 -->
    
    <!-- Plugin: flag icons - http://lipis.github.io/flag-icon-css/ -->
    <link href="assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    
    <!-- Theme style -->
    <link href="assets/css/theme-style.css" rel="stylesheet">
    
    <!--Your custom colour override-->
    <link href="#" id="colour-scheme" rel="stylesheet">
    
    <!-- Your custom override -->
    <link href="assets/css/custom-style.css" rel="stylesheet">
    
    
    <!-- Le fav and touch icons - @todo: fill with your icons or remove -->
    <link rel="shortcut icon" href="assets/assets/img/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/assets/img/icons/114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/assets/img/icons/72x72.png">
    <link rel="apple-touch-icon" href="assets/assets/img/icons/default.png">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rambla' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    
    <!--Plugin: Retina.js (high def image replacement) - @see: http://retinajs.com/-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/retina.js/1.3.0/retina.min.js"></script>
  </head>
  
  <!-- ======== @Region: body ======== -->
  <body class="page page-contact navbar-layout-default">
    
    <!-- @plugin: page loading indicator, delete to remove loader -->
    <div class="page-loader" data-toggle="page-loader"></div>
    
    <a href="#content" id="top" class="sr-only">Skip to content</a> 
    
    <!-- ======== @Region: #header ======== -->
    <div id="header">
      
      <!--Hidden Header Region-->
      <div class="header-hidden collapse">
        <div class="header-hidden-inner container">
          <div class="row">
            <div class="col-sm-6">
              <h3>
                About Us
              </h3>
              <p>Making the web a prettier place one template at a time! We make beautiful, quality, responsive Drupal & web templates!</p>
              <a href="about.htm" class="btn btn-sm btn-primary">Find out more</a> 
            </div>
            <div class="col-sm-6">
              <!--@todo: replace with company contact details-->
              <h3>
                Contact Us
              </h3>
              <address>
                <p>
                  <abbr title="Phone"><i class="fa fa-phone"></i></abbr>
                  019223 8092344
                </p>
                <p>
                  <abbr title="Email"><i class="fa fa-envelope"></i></abbr>
                  info@themelize.me
                </p>
                <p>
                  <abbr title="Address"><i class="fa fa-home"></i></abbr>
                  Sunshine House, Sunville. SUN12 8LU.
                </p>
              </address>
            </div>
          </div>
        </div>
      </div>
      
      <!--Header upper region-->
      <div class="header-upper">
        <!--Show/hide trigger for #hidden-header -->
        <div id="header-hidden-link">
          <a href="#" title="Click me you'll get a surprise" class="show-hide" data-toggle="show-hide" data-target=".header-hidden"><i></i>Open</a>
        </div>
        <!-- all direct children of the .header-inner element will be vertically aligned with each other you can override all the behaviours using the flexbox utilities (flexbox.htm) All elements with .header-brand & .header-block-flex wrappers will automatically be aligned inline & vertically using flexbox, this can be overridden using the flexbox utilities (flexbox.htm) Use .header-block to stack elements within on small screen & "float" on larger screens use .flex-first or/and .flex-last classes to make an element show first or last within .header-inner or .headr-block elements -->
        <div class="header-inner container">
          <!--user menu-->
          <div class="header-block-flex flex-first mr-auto">
            <nav class="nav nav-sm header-block-flex">
              <a class="nav-link hidden-md-up" href="login.htm"><i class="fa fa-user"></i></a>
              <a class="nav-link text-xs text-uppercase hidden-sm-down" href="#signup-modal" data-toggle="modal">Sign Up</a> <a class="nav-link text-xs text-uppercase hidden-sm-down" href="#login-modal" data-toggle="modal">Login</a> 
            </nav>
            <div class="header-divider header-divider-sm"></div>
            <!--language menu-->
            <div class="dropdown dropdowns-no-carets">
              <a href="#en" class="nav-link text-xs p-1 dropdown-toggle" data-toggle="dropdown"><i class="flag-icon flag-icon-gb"></i></a>
              <div class="dropdown-menu dropdown-menu-mini dropdown-menu-primary">
                <a href="#es" class="dropdown-item lang-es"><i class="flag-icon flag-icon-es"></i> Spanish</a>
                <a href="#pt" class="dropdown-item lang-pt"><i class="flag-icon flag-icon-pt"></i> Portguese</a>
                <a href="#cn" class="dropdown-item lang-cn"><i class="flag-icon flag-icon-cn"></i> Chinese</a>
                <a href="#se" class="dropdown-item lang-se"><i class="flag-icon flag-icon-se"></i> Swedish</a>
              </div>
            </div>
          </div>
          <!--social media icons-->
          <div class="nav nav-icons header-block flex-last">
            <!--@todo: replace with company social media details-->
            <a href="#" class="nav-link"> <i class="fa fa-twitter-square icon-1x"></i> <span class="sr-only">Twitter</span> </a>
            <a href="#" class="nav-link"> <i class="fa fa-facebook-square icon-1x"></i> <span class="sr-only">Facebook</span> </a>
            <a href="#" class="nav-link"> <i class="fa fa-linkedin-square icon-1x"></i> <span class="sr-only">Linkedin</span> </a>
            <a href="#" class="nav-link"> <i class="fa fa-google-plus-square icon-1x"></i> <span class="sr-only">Google plus</span> </a>
          </div>
        </div>
      </div>
      <div data-toggle="sticky">
        
        <!--Header search region - hidden by default -->
        <div class="header-search collapse" id="search">
          <form class="search-form container">
            <input type="text" name="search" class="form-control search" value="" placeholder="Search">
            <button type="button" class="btn btn-link"><span class="sr-only">Search </span><i class="fa fa-search fa-flip-horizontal search-icon"></i></button>
            <button type="button" class="btn btn-link close-btn" data-toggle="search-form-close"><span class="sr-only">Close </span><i class="fa fa-times search-icon"></i></button>
          </form>
        </div>
        
        <!--Header & Branding region-->
        <div class="header">
          <!-- all direct children of the .header-inner element will be vertically aligned with each other you can override all the behaviours using the flexbox utilities (flexbox.htm) All elements with .header-brand & .header-block-flex wrappers will automatically be aligned inline & vertically using flexbox, this can be overridden using the flexbox utilities (flexbox.htm) Use .header-block to stack elements within on small screen & "float" on larger screens use .flex-first or/and .flex-last classes to make an element show first or last within .header-inner or .headr-block elements -->
          <div class="header-inner container">
            <!--branding/logo -->
            <div class="header-brand flex-first">
              <a class="header-brand-text" href="index.htm" title="Home">
                <h1>
                  <span>App</span>Strap<span>.</span>
                </h1>
              </a>
              <div class="header-divider hidden-md-down"></div>
              <div class="header-slogan hidden-md-down">Bootstrap 4 Theme</div>
            </div>
            <!-- other header content -->
            <div class="header-block flex-last">
              
              <!--Search trigger -->
              <a href="#search" class="btn btn-icon btn-link header-btn float-right flex-last" data-toggle="search-form" data-target=".header-search"><i class="fa fa-search fa-flip-horizontal search-icon"></i></a>
              
              <!-- mobile collapse menu button - data-toggle="collapse" = default BS menu - data-toggle="jpanel-menu" = jPanel Menu - data-toggle="overlay" = Overlay Menu -->
              <a href="#top" class="btn btn-link btn-icon header-btn float-right hidden-lg-up" data-toggle="jpanel-menu" data-target=".navbar-main" data-direction="right"> <i class="fa fa-bars"></i> </a>
            </div>
            
            <div class="navbar navbar-toggleable-md">
              <!--everything within this div is collapsed on mobile-->
              <div class="navbar-main collapse">
                <!--main navigation-->
                <ul class="nav navbar-nav float-lg-right dropdown-effect-fade">
                  <!-- Homepages -->
                  <li class="nav-item">
                    <a href="index.htm" class="nav-link dropdown-toggle" id="indexs-drop" data-toggle="dropdown" data-hover="dropdown"> <i class="fa fa-home nav-link-icon"></i> <span class="hidden-xs-up">Home</span> </a>
                    <div class="dropdown-menu" role="menu" aria-labelledby="indexs-drop">
                      <a href="demo-travel-blog.htm" class="dropdown-item">Travel Blog</a> <a href="demo-jobs.htm" class="dropdown-item">Jobs Site</a> <a href="index-static.htm" class="dropdown-item">Homepage No Slider</a> <a href="index-boxed.htm" class="dropdown-item">Homepage Boxed</a> <a href="index-promo-header.htm" class="dropdown-item">Promo Header</a> <a href="index-corporate.htm" class="dropdown-item">Corporate Homepage</a> <a href="index-restaurant.htm" class="dropdown-item">Restaurant Homepage</a> 
                      <div class="dropdown dropdown-submenu">
                        <a href="#" class="dropdown-item" id="index-onepagers-drop" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">One Pagers</a> 
                        <!-- One Pagers: Dropdown Menu -->
                        <div class="dropdown-menu" role="menu" aria-labelledby="index-onepagers-drop"> <a href="index-onepager.htm" class="dropdown-item">One Pager Slideshow</a> <a href="index-onepager-image.htm" class="dropdown-item">One Pager Image</a> <a href="index-onepager-image-full-height.htm" class="dropdown-item">One Pager Image Full Height</a> <a href="index-onepager-bg-slideshow.htm" class="dropdown-item">One Pager Background Slideshow</a> </div>
                      </div>
                    </div>
                  </li>
                  
                  <!-- Pages -->
                  <li class="nav-item dropdown active">
                    <a href="#" class="nav-link dropdown-toggle" id="pages-drop" data-toggle="dropdown" data-hover="dropdown">Pages</a> 
                    <!-- Menu -->
                    <div class="dropdown-menu">
                      <div class="dropdown dropdown-submenu">
                        <a href="about.htm" class="dropdown-item dropdown-toggle" id="about-drop" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">About</a> 
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu" role="menu" aria-labelledby="about-drop"> <a href="about.htm" class="dropdown-item">About Us Basic</a> <a href="about-extended.htm" class="dropdown-item">About Us Extended</a> <a href="about-me.htm" class="dropdown-item">About Me</a> <a href="team.htm" class="dropdown-item">Team List</a> <a href="team-grid.htm" class="dropdown-item">Team Grid</a> <a href="team-member.htm" class="dropdown-item">Team Member</a> <a href="contact.htm" class="dropdown-item">Contact</a> <a href="contact.php" class="dropdown-item active">Contact (PHP)</a> </div>
                      </div>
                      <div class="dropdown dropdown-submenu">
                        <a href="blog.htm" class="dropdown-item dropdown-toggle" id="blog-drop" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Blog</a> 
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu"> <a href="blog.htm" class="dropdown-item">Blog List Right Sidebar</a> <a href="blog-leftbar.htm" class="dropdown-item">Blog List Left Sidebar</a> <a href="blog-timeline.htm" class="dropdown-item">Blog List Timeline</a> <a href="blog-grid.htm" class="dropdown-item">Blog List Grid</a> <a href="blog-post.htm" class="dropdown-item">Blog Post</a> <a href="blog-post-video.htm" class="dropdown-item">Blog Post With Video</a> <a href="blog-post-slideshow.htm" class="dropdown-item">Blog Post With Slideshow</a> <a href="blog-post-audio.htm" class="dropdown-item">Blog Post With Audio Clip</a> </div>
                      </div>
                      <div class="dropdown dropdown-submenu">
                        <a href="pricing.htm" class="dropdown-item dropdown-toggle" id="pricing-drop" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Pricing</a> 
                        <!-- pricing pages -->
                        <div class="dropdown-menu"> <a href="pricing.htm" class="dropdown-item">Pricing Plans</a> <a href="pricing-tables.htm" class="dropdown-item">Comparison Tables</a> </div>
                      </div>
                      <div class="dropdown dropdown-submenu">
                        <a href="timeline.htm" class="dropdown-item dropdown-toggle" id="timeline-drop" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Timeline</a> 
                        <!-- timelines -->
                        <div class="dropdown-menu" role="menu" aria-labelledby="timeline-drop"> <a href="timeline.htm" class="dropdown-item">Timeline Default</a> <a href="timeline-left.htm" class="dropdown-item">Timeline Left</a> <a href="timeline-right.htm" class="dropdown-item">Timeline Right</a> <a href="timeline-stacked.htm" class="dropdown-item">Timeline Stacked</a> </div>
                      </div>
                      <a href="customers.htm" class="dropdown-item">Customers</a> <a href="features.htm" class="dropdown-item">Features/Services</a> <a href="login.htm" class="dropdown-item">Login</a> <a href="signup.htm" class="dropdown-item">Sign Up</a> <a href="starter.htm" class="dropdown-item">Starter Snippets</a> <a href="404.htm" class="dropdown-item">404 Error</a> 
                    </div>
                  </li>
                  
                  <!-- Features -->
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="more-drop" data-toggle="dropdown" data-hover="dropdown">Features</a> 
                    <!-- Dropdown Menu -->
                    <div class="dropdown-menu">
                      <div class="dropdown dropdown-submenu dropdown-menu-left">
                        <a href="headers.htm" class="dropdown-item dropdown-toggle" id="headers-drop" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Header Variations (17)</a> 
                        <!-- Header variations -->
                        <div class="dropdown-menu" role="menu" aria-labelledby="headers-drop"> <a href="header-elements.htm" class="dropdown-item">Header Elements</a> <a href="header-offcanvas.htm" class="dropdown-item">Header Off Canvas</a> <a href="header-collapse-menu.htm" class="dropdown-item">Header Collapse Menu</a> <a href="header-overlay-menu.htm" class="dropdown-item">Header Overlay Menu</a> <a href="header-collapse-menu-responsive.htm" class="dropdown-item">Header Responsive Collapse Menu</a> <a href="header-fullwidth.htm" class="dropdown-item">Header Full Width</a> <a href="header-navbar-below.htm" class="dropdown-item">Header Navbar Below</a> <a href="header-compact.htm" class="dropdown-item">Header Compact</a> <a href="header-dark.htm" class="dropdown-item">Header Dark</a> <a href="header-primary.htm" class="dropdown-item">Header Primary</a> <a href="header-transparent.htm" class="dropdown-item">Header Transparent</a> <a href="header-transparent-dark.htm" class="dropdown-item">Header Transparent Dark</a> <a href="header-transparent-primary.htm" class="dropdown-item">Header Transparent Primary</a> <a href="header-translucent.htm" class="dropdown-item">Header Translucent</a> <a href="header-translucent-dark.htm" class="dropdown-item">Header Translucent Dark</a> <a href="header-translucent-primary.htm" class="dropdown-item">Header Translucent Primary</a> <a href="header-nav-left.htm" class="dropdown-item">Header Nav Left</a> <a href="header-bottom.htm" class="dropdown-item">Header Bottom</a> </div>
                      </div>
                      <div class="dropdown dropdown-submenu dropdown-menu-left">
                        <a href="headers.htm" class="dropdown-item dropdown-toggle" id="footers-drop" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Footer Variations (5)</a> 
                        <!-- Header variations -->
                        <div class="dropdown-menu" role="menu" aria-labelledby="footers-drop"> <a href="footer-light.htm" class="dropdown-item">Footer Light</a> <a href="footer-compact.htm" class="dropdown-item">Footer Compact</a> <a href="footer-menus.htm" class="dropdown-item">Footer Menus</a> <a href="footer-compact-light.htm" class="dropdown-item">Footer Compact Light</a> <a href="footer-menus-light.htm" class="dropdown-item">Footer Menus Light</a> </div>
                      </div>
                      <div class="dropdown dropdown-submenu dropdown-menu-left">
                        <a href="sliders.htm" class="dropdown-item dropdown-toggle" id="slider-drop" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Sliders</a> 
                        <!-- Sliders -->
                        <div class="dropdown-menu">
                          <!--Slider Revolution -->
                          <h4 class="dropdown-header">
                            Slider Revolution
                          </h4>
                          <a href="slider-revolution-default.htm" class="dropdown-item">Default</a> <a href="slider-revolution-full.htm" class="dropdown-item">Full Width</a> <a href="slider-revolution-behind.htm" class="dropdown-item">Behind Navbar</a> <a href="slider-revolution-boxed.htm" class="dropdown-item">Boxed</a> 
                          <!--Backstretch Slider-->
                          <h4 class="dropdown-header">
                            Backstretch
                          </h4>
                          <a href="backstretch.htm" class="dropdown-item">Background Slideshow</a> <a href="backstretch-boxed.htm" class="dropdown-item">Boxed Background Slideshow</a> 
                          <!--Flexslider-->
                          <h4 class="dropdown-header">
                            Flexslider
                          </h4>
                          <a href="flexslider-default.htm" class="dropdown-item">Default</a> <a href="flexslider-full.htm" class="dropdown-item">Full Width</a> <a href="flexslider-behind.htm" class="dropdown-item">Behind Navbar</a> <a href="flexslider-boxed.htm" class="dropdown-item">Boxed</a> 
                        </div>
                      </div>
                      <a href="grid.htm" class="dropdown-item">Grid System</a> <a href="flexbox.htm" class="dropdown-item">Flexbox!</a> <a href="colours.htm" class="dropdown-item">Theme Colours</a> 
                    </div>
                  </li>
                  
                  <!-- Elements/shortcodes -->
                  <li class="nav-item dropdown dropdown-mega-menu dropdown-mega-menu-75">
                    <a href="#" class="nav-link dropdown-toggle" id="shop-drop" data-toggle="dropdown" data-hover="dropdown">Shop</a> 
                    <!-- Dropdown Menu - mega menu-->
                    <div class="dropdown-menu dropdown-menu-right">
                      <div class="row">
                        <div class="col-lg-6">
                          <h3 class="dropdown-header mt-0 pt-0">
                            Pages
                          </h3>
                          <a href="shop.htm" class="dropdown-item">Shop Home</a> <a href="shop-cart.htm" class="dropdown-item">Cart</a> <a href="shop-checkout.htm" class="dropdown-item">Checkout</a> <a href="shop-confirmation.htm" class="dropdown-item">Confirmation</a> <a href="shop-grid.htm" class="dropdown-item">Products Grid</a> <a href="shop-list.htm" class="dropdown-item">Products List</a> <a href="shop-product.htm" class="dropdown-item">Product View</a> 
                        </div>
                        <div class="col-lg-6 hidden-md-down">
                          <h3 class="dropdown-header mt-0 pt-0">
                            Widget <span class="badge badge-primary text-uppercase">Hot</span>
                          </h3>
                          <div class="dropdown-widget">
                            <!-- Shop product carousel Uses Owl Carousel plugin All options here are customisable from the data-owl-carousel-settings="{OBJECT}" item via data- attributes: http://www.owlgraphic.com/owlcarousel/#customizing ie. data-settings="{"items": "4", "lazyLoad":"true", "navigation":"true"}" -->
                            <div class="products-carousel owl-nav-over" data-toggle="owl-carousel" data-owl-carousel-settings='{"items": 1,"responsive":{"0":{"items":1,"nav":true, "dots":false}}}'>
                              <a href="#">
                                <img src="assets/img/shop/jacket-1.jpg" alt="Item 1 image" class="lazyOwl img-fluid" />
                              </a>
                              <a href="#">
                                <img src="assets/img/shop/jacket-2.jpg" alt="Item 2 image" class="lazyOwl img-fluid" />
                              </a>
                              <a href="#">
                                <img src="assets/img/shop/jacket-3.jpg" alt="Item 3 image" class="lazyOwl img-fluid" />
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  
                  <!-- Elements/shortcodes -->
                  <li class="nav-item dropdown dropdown-mega-menu">
                    <a href="#" class="nav-link dropdown-toggle" id="elements-drop" data-toggle="dropdown" data-hover="dropdown">Elements</a> 
                    <!-- Dropdown Menu - mega menu-->
                    <div class="dropdown-menu">
                      <h4 class="dropdown-header hidden-md-down mt-0">
                        29 pages of elements/snippets <i class="new-tag">Updated!</i>
                      </h4>
                      <div class="row">
                        <div class="col-lg-3"> <a href="elements-alerts.htm" class="dropdown-item">Alerts</a> <a href="elements-animation.htm" class="dropdown-item">Animations</a> <a href="elements-badges.htm" class="dropdown-item">Badges</a> <a href="elements-button-groups.htm" class="dropdown-item">Button Groups</a> <a href="elements-buttons.htm" class="dropdown-item">Buttons</a> <a href="elements-cards.htm" class="dropdown-item">Cards</a> <a href="elements-carousels.htm" class="dropdown-item">Carousels</a> </div>
                        <div class="col-lg-3"> <a href="elements-collapse.htm" class="dropdown-item">Collapse / Accordions</a> <a href="elements-colour-utils.htm" class="dropdown-item">Colours Utils</a> <a href="elements-counters.htm" class="dropdown-item">Counters</a> <a href="elements-ctas.htm" class="dropdown-item">Call To Action Blocks</a> <a href="elements-dropdowns.htm" class="dropdown-item">Dropdowns</a> <a href="elements-forms.htm" class="dropdown-item">Forms</a> <a href="elements-forms-input-groups.htm" class="dropdown-item">Forms Input Groups</a> </div>
                        <div class="col-lg-3"> <a href="elements-icons.htm" class="dropdown-item">Iconsets</a> <a href="elements-list-groups.htm" class="dropdown-item">List Groups</a> <a href="elements-modals.htm" class="dropdown-item">Modals</a> <a href="elements-modals-onload.htm" class="dropdown-item">Modals Onload</a> <a href="elements-navs.htm" class="dropdown-item">Navs</a> <a href="elements-navs-tabbable.htm" class="dropdown-item">Tabbable Navs</a> <a href="elements-overlays.htm" class="dropdown-item">Overlays</a> </div>
                        <div class="col-lg-3"> <a href="elements-progressbars.htm" class="dropdown-item">Progress Bars</a> <a href="elements-spacers.htm" class="dropdown-item">Spacers</a> <a href="elements-tables.htm" class="dropdown-item">Tables</a> <a href="elements-tooltips-popovers.htm" class="dropdown-item">Tooltips & Popovers</a> <a href="elements-type-effect.htm" class="dropdown-item">Type Effect</a> <a href="elements-typography.htm" class="dropdown-item">Typography</a> <a href="elements-utils.htm" class="dropdown-item">Utilities</a> </div>
                        <div class="col-lg-3"> <a href="elements-video-blocks.htm" class="dropdown-item">Video Blocks</a> </div>
                      </div>
                    </div>
                  </li>
                  
                  <!-- Mega menu example -->
                  <li class="nav-item dropdown dropdown-mega-menu">
                    <a href="#" class="nav-link dropdown-toggle" id="megamenu-drop" data-toggle="dropdown" data-hover="dropdown">Mega Menu</a> 
                    <!-- Dropdown Menu - Mega Menu -->
                    <div class="dropdown-menu">
                      <h4 class="dropdown-header hidden-md-down mt-0">
                        Mega Menu with links & text items
                      </h4>
                      <div class="row">
                        <div class="col-lg-3">
                          <a href="features.htm" class="hidden-md-down">
                            <img src="assets/img/features/feature-1.png" alt="Feature 1" class="img-fluid" />
                          </a>
                          <a href="features.htm" class="dropdown-item"><strong>Mobile Friendly</strong></a>
                          <span class="hidden-md-down">Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio!</span> 
                        </div>
                        <div class="col-lg-3">
                          <a href="features.htm" class="hidden-md-down">
                            <img src="assets/img/features/feature-2.png" alt="Feature 2" class="img-fluid" />
                          </a>
                          <a href="features.htm" class="dropdown-item"><strong>24/7 Support</strong></a>
                          <span class="hidden-md-down">Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio!</span> 
                        </div>
                        <div class="col-lg-3">
                          <a href="features.htm" class="hidden-md-down">
                            <img src="assets/img/features/feature-3.png" alt="Feature 3" class="img-fluid" />
                          </a>
                          <a href="features.htm" class="dropdown-item"><strong>99% Uptime</strong></a>
                          <span class="hidden-md-down">Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio!</span> 
                        </div>
                        <div class="col-lg-3">
                          <a href="features.htm" class="hidden-md-down">
                            <img src="assets/img/features/feature-4.png" alt="Feature 4" class="img-fluid" />
                          </a>
                          <a href="features.htm" class="dropdown-item"><strong>Upgrade Assistance</strong></a>
                          <span class="hidden-md-down">Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio!</span> 
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <!--/.navbar-collapse -->
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- ======== @Region: #content ======== -->
    <div id="content">
      <div class="container">
        <div class="row">
          <!-- sidebar -->
          <div class="col-md-3">
            
            <!-- Sections Menu-->
            <div class="nav-section-menu">
              <div class="nav nav-list">
                <span class="nav-header">In This Section</span> 
                <a href="about.htm" class="nav-link first">
                  About Us 
                  <small>Basic Version</small>
                  <i class="fa fa-angle-right"></i>
                </a>
                <a href="about-extended.htm" class="nav-link">
                  About Us 
                  <small>Extended Version</small>
                  <i class="fa fa-angle-right"></i>
                </a>
                <a href="about-me.htm" class="nav-link">
                  About Me 
                  <small>More About Me</small>
                  <i class="fa fa-angle-right"></i>
                </a>
                <a href="team.htm" class="nav-link">
                  The Team 
                  <small>Team List</small>
                  <i class="fa fa-angle-right"></i>
                </a>
                <a href="team-grid.htm" class="nav-link">
                  The Team 
                  <small>Team Grid</small>
                  <i class="fa fa-angle-right"></i>
                </a>
                <a href="team-member.htm" class="nav-link">
                  Team Member 
                  <small>Individual Display</small>
                  <i class="fa fa-angle-right"></i>
                </a>
                <a href="contact.htm" class="nav-link">
                  Contact Us
                  <small>How to get in touch</small>
                  <i class="fa fa-angle-right"></i>
                </a>
                <a href="contact.php" class="nav-link active">
                  Contact Us (PHP)
                  <small>How to get in touch</small>
                  <i class="fa fa-angle-right"></i>
                </a>                
              </div>
            </div>
          </div>
          <!--main content-->
          <div class="col-md-9">
            <h2 class="title-divider">
              <span>Contact <span class="font-weight-normal text-muted">Us</span></span>
              <small>Ways To Get In Touch</small>
            </h2>
            <?php echo !empty($form_message) ? $form_message : ''; // Show message to user, errors or success ?>
            
            <!-- The form: submits to itself -->
            <form id="contact-form" action="contact.php" method="POST">
              <div class="form-group<?php echo !empty($form_errors['contact-name']) ? ' has-danger' : ''; // add danger class is error on field ?>">
                <label class="sr-only" for="contact-name">Name</label>
                <input type="text" value="<?php echo !empty($form_values['contact-name']) ? $form_values['contact-name'] : ''; ?>" class="form-control<?php echo !empty($form_errors['contact-name']) ? ' form-control-danger' : ''; // add danger class is error on field ?>" name="contact-name" id="contact-name" placeholder="Name">
                <small id="contact-name-help" class="form-text text-muted">First and last names.</small>
              </div>
              <div class="form-group<?php echo !empty($form_errors['contact-email']) ? ' has-danger' : ''; // add danger class is error on field ?>">
                <label class="sr-only" for="contact-email">Email</label>
                <input type="email" value="<?php echo !empty($form_values['contact-email']) ? $form_values['contact-email'] : ''; ?>" class="form-control<?php echo !empty($form_errors['contact-email']) ? ' form-control-danger' : ''; // add danger class is error on field ?>" name="contact-email" id="contact-email" placeholder="Email">
                <small id="contact-email-help" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group<?php echo !empty($form_errors['contact-message']) ? ' has-danger' : ''; // add danger class is error on field ?>">
                <label class="sr-only" for="contact-message">Message</label>
                <textarea rows="12" class="form-control<?php echo !empty($form_errors['contact-message']) ? ' form-control-danger' : ''; // add danger class is error on field ?>" name="contact-message" id="contact-message" placeholder="Message"><?php echo !empty($form_values['contact-message']) ? $form_values['contact-message'] : ''; ?></textarea>
                <small id="contact-message-help" class="form-text text-muted">Your message and details.</small>
              </div>
              <input type="submit" class="btn btn-primary" value="Send Message">
            </form>
              
          </div>
        </div>
      </div>
    </div>
    
    <!-- ======== @Region: #content-below ======== -->
    <div id="content-below">
      <!-- Awesome features call to action -->
      <div class="bg-primary text-white py-4">
        <div class="container">
          <div class="row text-center text-lg-left">
            <div class="col-12 col-lg-7 py-2">
              <h2 class="text-uppercase font-weight-bold mt-0 mb-2">
                <span class="text-shadow">Awesome</span> <span class="text-primary-darkend">Features</span>
              </h2>
              <h5 class="text-faded">
                99.9% Uptime <span class="text-primary-darkend font-weight-bold px-lg-1">/</span> Free Upgrades <span class="text-primary-darkend font-weight-bold px-lg-1">/</span> Fully Responsive <span class="text-primary-darkend font-weight-bold px-lg-1">/</span> Bug Free 
              </h5>
            </div>
            <div class="col-12 col-lg-5 py-2 text-lg-right">
              <a href="https://wrapbootstrap.com/theme/appstrap-responsive-website-template-WB0C6D0H4?ref=themelizeme" class="btn btn-lg btn-primary btn-invert btn-rounded py-3 px-4">Get AppStrap Today<i class="fa fa-arrow-right ml-2"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- ======== @Region: #footer ======== -->
    <footer id="footer" class="p-0">
      <div class="container pt-6 pb-5">
        <div class="row">
          <div class="col-md-4">
            <!--@todo: replace with company contact details-->
            <h4 class="text-uppercase text-white">
              Contact Us
            </h4>
            <address>
              <ul class="list-unstyled">
                <li>
                  <abbr title="Phone"><i class="fa fa-phone fa-fw"></i></abbr>
                  019223 8092344
                </li>
                <li>
                  <abbr title="Email"><i class="fa fa-envelope fa-fw"></i></abbr>
                  info@appstraptheme.com
                </li>
                <li>
                  <abbr title="Address"><i class="fa fa-home fa-fw"></i></abbr>
                  Sunshine House, Sunville. SUN12 8LU.
                </li>
              </ul>
            </address>
          </div>
          
          <div class="col-md-4">
            <h4 class="text-uppercase text-white">
              About Us
            </h4>
            <p>Making the web a prettier place one template at a time! We make beautiful, quality, responsive Drupal & web templates!</p>
          </div>
          
          <div class="col-md-4">
            <h4 class="text-uppercase text-white">
              Newsletter
            </h4>
            <p>Stay up to date with our latest news and product releases by signing up to our newsletter.</p>
            <!--@todo: replace with mailchimp code-->
            <form>
              <div class="input-group">
                <label class="sr-only" for="email-field">Email</label>
                <input type="text" class="form-control" id="email-field" placeholder="Email">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">Go!</button>
                </span>
              </div>
            </form>
          </div>
        </div>
        
      </div>
      <hr class="my-0 hr-blank op-2" />
      <!--@todo: replace with company copyright details-->
      <div class="bg-inverse-dark text-sm py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p class="mb-0">Site template by <a href="appstraptheme.com" class="footer-link">AppStrap</a> | Copyright 2017 &copy; AppStrap</p>
            </div>
            <div class="col-md-6">
              <ul class="list-inline footer-links float-md-right mb-0">
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <a href="#top" class="btn btn-icon btn-inverse pos-fixed pos-b pos-r mr-3 mb-3 scroll-state-hidden hidden-md-down" title="Back to top" data-scroll="scroll-state"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>
    </footer>
    <!-- Style switcher - demo only - @todo: remove in production -->
    <div class="colour-switcher">
      <a href="#" class="colour-switcher-toggle" data-toggle="show" data-target=".colour-switcher"> <i class="fa fa-paint-brush"></i> </a>
      <h5 class="text-uppercase my-0">
        Theme Colours
      </h5>
      <hr />
      <div class="theme-colours"> <a href="#green" class="green active" data-toggle="tooltip" data-placement="right" data-original-title="Green (Default)">Green</a> <a href="#red" class="red" data-toggle="tooltip" data-placement="right" data-original-title="Red">Red</a> <a href="#blue" class="blue" data-toggle="tooltip" data-placement="right" data-original-title="Blue">Blue</a> <a href="#purple" class="purple" data-toggle="tooltip" data-placement="right" data-original-title="Purple">Purple</a> <a href="#pink" class="pink" data-toggle="tooltip" data-placement="right" data-original-title="Pink">Pink</a> <a href="#orange" class="orange" data-toggle="tooltip" data-placement="right" data-original-title="Orange">Orange</a> <a href="#lime" class="lime" data-toggle="tooltip" data-placement="right" data-original-title="Lime">Lime</a> <a href="#blue-dark" class="blue-dark" data-toggle="tooltip" data-placement="right" data-original-title="Blue-dark">Blue-dark</a> <a href="#red-dark" class="red-dark" data-toggle="tooltip" data-placement="right" data-original-title="Red-dark">Red-dark</a> <a href="#brown" class="brown" data-toggle="tooltip" data-placement="right" data-original-title="Brown">Brown</a> <a href="#cyan-dark" class="cyan-dark" data-toggle="tooltip" data-placement="right" data-original-title="Cyan-dark">Cyan-dark</a> <a href="#yellow" class="yellow" data-toggle="tooltip" data-placement="right" data-original-title="Yellow">Yellow</a> <a href="#slate" class="slate" data-toggle="tooltip" data-placement="right" data-original-title="Slate">Slate</a> <a href="#olive" class="olive" data-toggle="tooltip" data-placement="right" data-original-title="Olive">Olive</a> <a href="#teal" class="teal" data-toggle="tooltip" data-placement="right" data-original-title="Teal">Teal</a> <a href="#green-bright" class="green-bright" data-toggle="tooltip" data-placement="right" data-original-title="Green-bright">Green-bright</a> </div>
      <hr />
      <small class="text-muted">Cookies are NOT enabled so colour selection is not persistent.</small>
    </div>
    <!--Hidden elements - excluded from jPanel Menu on mobile-->
    <div class="hidden-elements jpanel-menu-exclude">
      <!--@modal - signup modal-->
      <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">
                Sign Up
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <form action="signup.htm">
                <div class="form-group">
                  <h5>
                    Price Plan
                  </h5>
                  <select class="form-control">
                    <option>Basic</option>
                    <option>Pro</option>
                    <option>Pro +</option>
                  </select>
                </div>
                <hr />
                
                <h5>
                  Account Information
                </h5>
                <div class="form-group">
                  <label class="sr-only" for="signup-first-name">First Name</label>
                  <input type="text" class="form-control" id="signup-first-name" placeholder="First name">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="signup-last-name">Last Name</label>
                  <input type="text" class="form-control" id="signup-last-name" placeholder="Last name">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="signup-username">Userame</label>
                  <input type="text" class="form-control" id="signup-username" placeholder="Username">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="signup-email">Email address</label>
                  <input type="email" class="form-control" id="signup-email" placeholder="Email address">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="signup-password">Password</label>
                  <input type="password" class="form-control" id="signup-password" placeholder="Password">
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" value="term" class="form-check-input">
                    I agree with the Terms and Conditions. 
                  </label>
                </div>
                <hr />
                <button class="btn btn-primary" type="submit">Sign up</button>
              </form>
            </div>
            <div class="modal-footer">
              <small>Already signed up? <a href="login.htm">Login here</a>.</small>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      
      <!--@modal - login modal-->
      <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">
                Login
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <form action="login.htm">
                <div class="form-group">
                  <label class="sr-only" for="login-email">Email</label>
                  <input type="email" id="login-email" class="form-control email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="login-password">Password</label>
                  <input type="password" id="login-password" class="form-control password" placeholder="Password">
                </div>
                <button type="button" class="btn btn-primary">Login</button>
              </form>
            </div>
            <div class="modal-footer">
              <small>Not a member? <a href="#" class="signup">Sign up now!</a></small>
              <br />
              <small><a href="#">Forgotten password?</a></small>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
    
    
    <!--jQuery 1.12.0 via CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Tether 1.1.1 via CDN, needed for Bootstrap Tooltips & Popovers -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.1.1/js/tether.min.js"></script>
    
    <!-- Bootstrap 4.0.0-alpha.6 JS via CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    
    
    <!-- JS plugins required on all pages NOTE: Additional non-required plugins are loaded ondemand as of AppStrap 2.5 -->
    
    <!--Custom scripts mainly used to trigger libraries/plugins -->
    <script src="assets/js/script.min.js"></script>
  </body>
</html>