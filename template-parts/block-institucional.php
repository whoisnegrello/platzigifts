<?php $fields = get_fields(); ?>

<div class="row">
    <div class="col-12">
        <img src="<?php echo $fields['imagen']['sizes']['large']; ?>" />
        <hr>
        <?php echo $fields['texto']; ?>
    </div>
</div>