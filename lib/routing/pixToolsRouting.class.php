<?php

/**
 *
 * @package    pixToolsRouting
 * @subpackage plugin
 * @author     Nicolas Ricci
 * @version    SVN: $Id: sfGuardRouting.class.php 30723 2010-08-22 09:51:02Z gimler $
 */
class pixToolsRouting
{
    /**
     * Listens to the routing.load_configuration event.
     *
     * @param sfEvent An sfEvent instance
     * @static
     */
    static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
    {
        $r = $event->getSubject();

        // preprend our routes
        $r->prependRoute('pix_contact', new sfRoute('/:sf_culture/contact', array('module' => 'pixContact', 'action' => 'index')));
        $r->prependRoute('pix_contact_validation', new sfRoute('/:sf_culture/contact/validation', array('module' => 'pixContact', 'action' => 'create')));
        $r->prependRoute('pix_newsletter_validation', new sfRoute('/:sf_culture/newsletter/validation', array('module' => 'pixNewsletter', 'action' => 'create')));
        $r->prependRoute('pix_newsletter_confirmation', new sfRoute('/:sf_culture/newsletter/confirmation', array('module' => 'pixNewsletter', 'action' => 'confirmation')));
    }

}
