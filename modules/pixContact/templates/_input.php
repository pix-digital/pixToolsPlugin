<?php if(!$field->isHidden()):?>
<p>
  <?php echo $field->renderLabel() ?>
    <?php echo $field->render(array('class' => isset($class) ? $class : '')) ?>
    <?php echo $field->renderError() ?>
    <em class="help"><?php echo $field->renderHelp() ?></em>
</p>
<?php else:?>
  <?php echo $field->render() ?>
<?php endif;?>