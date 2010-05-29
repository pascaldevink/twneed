<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php use_stylesheet('main.css') ?>
        <?php use_stylesheet('extra.css') ?>
        <?php include_stylesheets() ?>
        <?php use_javascript('update.js') ?>
        <?php include_javascripts() ?>
    </head>
    <body class="home2">
        <div class="header">
            <div class="container">
                <a href="/"><img width="107" height="24" alt="twitterineed" src="/images/logo.png" /></a>
                <div class="links">
                    <a href="/about">About TwitterINeed</a>
                    <a href="/#">Interesting link</a>
                    <a href="/#">Another interesting link</a>
                </div>
            </div>
        </div>
        <div class="container"
        <?php echo $sf_content ?>
        </div>
        <div id="footer">

            <div class="container">
                <div class="bar">
                    <strong>Keep in touch by </strong> <a href="http://twitter.com/twneed">following us on Twitter</a>.
                </div>

            </div>
            <div class="legal">
                <a href="http://twneed.inpiggy.nl"><img width="181" height="40" alt="Twitter I Need" src="/images/logo_twneed.png"></a>
                <a href="http://www.inpiggy.nl"><img width="181" height="40" alt="InPiggy" src="/images/logo_inpiggy.png"></a>
                <br />
                All text and design is copyright &copy;2009-2010 InPiggy. All rights reserved.<br /><br />
            </div>
        </div>

        <script type="text/javascript">
            var uservoiceOptions = {
              /* required */
              key: 'twneed',
              host: 'twneed.uservoice.com',
              forum: '48645',
              showTab: true,
              /* optional */
              alignment: 'left',
              background_color:'#222',
              text_color: 'white',
              hover_color: '#f00',
              lang: 'en'
            };

            function _loadUserVoice() {
              var s = document.createElement('script');
              s.setAttribute('type', 'text/javascript');
              s.setAttribute('src', ("https:" == document.location.protocol ? "https://" : "http://") + "cdn.uservoice.com/javascripts/widgets/tab.js");
              document.getElementsByTagName('head')[0].appendChild(s);
            }
            _loadSuper = window.onload;
            window.onload = (typeof window.onload != 'function') ? _loadUserVoice : function() { _loadSuper(); _loadUserVoice(); };
        </script>
    </body>
</html>
