<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php use_stylesheet('jqtouch.min.css') ?>
        <?php use_stylesheet('themes/apple/theme.css') ?>
        <?php include_stylesheets() ?>
        <?php use_javascript('jqtouch.min.js') ?>
        <?php use_javascript('iphone.js') ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <?php echo $sf_content ?>
    </body>
</html>
