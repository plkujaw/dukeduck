<?php
// Custom login page
add_action('login_enqueue_scripts', 'custom_login_page');

function custom_login_page()
{ ?>
  <style type="text/css">
    @import url(<?php echo esc_url(get_theme_file_uri('assets/fonts/Poppins-Regular.woff2')); ?>);

    body.login label,
    body.login a {
      font-family: 'Poppins', sans-serif;
      color: #071134;
    }

    body.login input {
      border-color: #01928e;
      border-radius: 0;
      outline: #01928e;
    }

    body.login input:focus {
      border-color: #01928e;
      outline: 1px solid #01928e;
      box-shadow: none !important;
    }

    body.login div#login form#loginform p.submit input#wp-submit {
      background: #fff;
      border-color: #01928e;
      border-radius: 0;
      transition: all 0.3s ease-in-out;
      color: #01928e;
    }

    body.login div#login form#loginform p.submit input#wp-submit:hover {
      color: #fff;
      background: #01928e;

    }

    body.login div#login form#loginform {
      background: #fff;
      border: none;
    }

    body.login #login_error {
      background-color: #f2f1f0;
      border-left-color: #ed5221;
    }

    body.login .message {
      border-left: 4px solid #01928e;
    }

    body.login div#login h1 a {
      background-image: url(<?php echo get_template_directory_uri() . '/assets/img/logo.svg'; ?>);
      background-repeat: no-repeat;
      background-size: contain;
      width: 250px;
      height: 100px;
      margin-bottom: 0;
    }

    body.login a {
      color: #071134 !important;
    }

    body.login a:hover {
      text-decoration: underline !important;
    }

    body.login div#login p#backtoblog {
      display: none;
    }

    body.login {
      background-color: #f2f1f0;
    }
  </style>
<?php }



// Custom login header link

add_filter('login_headerurl', 'custom_loginlogo_url');

function custom_loginlogo_url($url)
{
  return home_url();
}
