<div class="current" id="home">
    <div class="toolbar high">
        <h1>Twitter I Need</h1>
        <a href="#add" id="addButton" class="button add slideup">+</a>
    </div>
    <ul class="rounded">
        <?php foreach ($needs as $need): ?>
            <li class="arrow" id="publication_<?php echo $need->getId() ?>"><a href="#<?php echo $need->getId() ?>"><?php echo $need->getAuthor()?></a></li>
        <?php endforeach; ?>
    </ul>
    <div class="info">
        <p>Add this page to your home screen to view the custom icon, startup screen, and full screen mode.</p>
    </div>
</div>

<div id="add">
    <div class="toolbar">
        <h1>Add Need</h1>
        <a href="#home" id="cancelButton" class="button back slidedown">Back</a>
        <a href="#home" id="doneButton" class="button done slidedown">Done</a>
    </div>
    <ul class="rounded">
        
    </ul>
</div>

<div id="1">
    <div class="toolbar">
        <h1>Twitter I Need</h1>
        <a href="#add" id="addButton" class="button add slideup">+</a>
    </div>
    <ul class="rounded">
        
            <li class="arrow" id=""><a href="#">Home</a></li>
        
    </ul>
    <div class="info">
        <p>Add this page to your home screen to view the custom icon, startup screen, and full screen mode.</p>
    </div>
</div>

