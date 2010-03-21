<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
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
                <a onclick="return sendOffsite(this, '/outbound/37signals.com')" href="http://37signals.com"><img width="181" height="40" alt="twitterineed" src="/images/logo.png"></a><br />

                All text and design is copyright &copy;1999-2010 37signals, LLC. All rights reserved.<br /><br />
                <a href="http://37signals.com/security">Security Information</a>
            </div>
        </div>
    </body>
</html>
