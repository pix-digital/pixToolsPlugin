<?php if ($sf_user->hasFlash('confirmation')): ?>
    <div id="confirmation">
        <?php echo __($sf_user->getFlash('confirmation')) ?>
    </div>
<?php else: ?>

<form action="<?php echo url_for('@pix_contact_validation') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

  <fieldset class="form" >

    <?php if (!$form->getObject()->isNew()): ?>
      <input type="hidden" name="sf_method" value="put"/>
    <?php endif; ?>

    <?php foreach ($form as $fieldName => $field): ?>
      <?php include_partial('pixContact/input', array('field' => $field)); ?>
    <?php endforeach; ?>

    <div class="grid_2 alpha prefix_1 row-control">
      <input type="submit" value="<?php echo __('Envoyer') ?>" class="buton"/>
    </div>

  </fieldset>

</form>
<?php endif; ?>