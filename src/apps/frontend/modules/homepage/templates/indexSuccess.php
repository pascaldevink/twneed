<div class="more">
     <div style="margin: 15px 0pt; width: 370px;" class="half">

        <div class="blurb extras buzz">
            <h4 style="margin-bottom: 10px;">Last requested needs</h4>
            <div class="extra_extra_news">
                <ul id="needslist">
                    <?php include_partial('homepage/needlist', array('needs' => $needs)) ?>
                </ul>
            </div>
        </div>
        <p>
            We already served <?php echo $number_of_needs ?> needs. <br />
            <span><?php echo $quote ?></span>
        </p>
    </div>

    <div class="half end">
        <h2>Leverage the power of twitter to provide for your needs!</h2>
        It's super easy: just send an @ reply message to <a href="http://www.twitter.com/twneed">@twneed</a>.<br />
        Make sure you send it in the following style and order:
        <ol>
            <li>@twneed I Need<br />&lt;your need&gt;</li>
            <li>in<br />&lt;your timeframe&gt;</li>
            <li>at<br />&lt;your location&gt;</li>
        </ol>

        <p><h2>Need a little more privacy?</h2>
            Sure thing! We think privacy is important, specially when it comes to your needs.<br />
            <br />
            That is why you can also send us a direct message with your need. Whenever a user replies to your need, that reply
            will be forwarded to you by direct message. This way, nobody knows who you are untill you are ready to reveal yourself.<br />
            <br />
            Send your message in the same style and order as a normal message and your privacy is guaranteed.
    </div>
</div>