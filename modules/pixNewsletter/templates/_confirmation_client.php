<p>Bonjour,<br />

<p>Pour confirmer votre inscription à notre newsletter, merci de suivre le lien suivant :<br/> 
  <a href="<?php echo url_for('@pix_newsletter_confirmation?code='.base64_encode($newsletter->getEmail()), array('absolute' => true)); ?>" ><?php echo url_for('@pix_newsletter_confirmation?code='.base64_encode($newsletter->getEmail()), array('absolute' => true)); ?></a>
</p>
