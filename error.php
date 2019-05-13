<?php if(count($myerrors) > 0) : ?>

<div>

<?php foreach($myerrors as $error) : ?>

<p> <?php echo $error ?></p>


<?php endforeach ?>

</div>

<?php endif?>