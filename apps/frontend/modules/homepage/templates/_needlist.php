<?php foreach ($needs as $need): ?>
<li id="publication_<?php echo $need->getId() ?>">
    <em><span time="Thu, 18 Mar 2010 20:54:58 +0000" class="relative_time">3 days</span> ago</em><br />
    <a href="http://www.twitter.com/<?php echo $need->getAuthor()?>">@<?php echo $need->getAuthor()?></a>
    needs <?php echo $need->getDescription() . ' ' . $need->getTimeframe() ?>
</li>
<?php endforeach; ?>