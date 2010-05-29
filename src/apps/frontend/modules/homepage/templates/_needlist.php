<?php
$reply_message = ' I have what you need!';
?>

<?php foreach ($needs as $need): ?>
<li id="publication_<?php echo $need->getId() ?>">
    <em><span time="Thu, 18 Mar 2010 20:54:58 +0000" class="relative_time">3 days</span> ago</em><br />
    <a href="http://twitter.com/<?php echo $need->getAuthor()?>">@<?php echo $need->getAuthor()?></a>
    needs <?php echo $need->getDescription() . ' ' . $need->getTimeframe() ?>
    <a class="reply" href="http://twitter.com/?status=@<?php echo $need->getAuthor().$reply_message ?>">&laquo; reply</a>
</li>
<?php endforeach; ?>