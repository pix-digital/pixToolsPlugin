<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div id="newsletter">
    <div class="form">
        <h3><?php echo __('Newsletter') ?></h3>
        <form action="<?php echo url_for('@pix_newsletter_validation') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
            <?php echo $form->renderHiddenFields(false) ?>
	        <?php echo $form['email']->render(array('placeholder' => __('Votre Email Ici'), 'id' => 'newsletter-input')) ?>
            <input type="submit" value="<?php echo __('OK') ?>" class="button"/>
        </form>
    </div>
</div>
