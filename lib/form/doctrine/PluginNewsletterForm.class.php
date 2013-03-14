<?php

/**
 * PluginNewsletter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginNewsletterForm extends BaseNewsletterForm
{

    public function configure()
    {

        unset($this['created_at'],
        $this['updated_at'],
        $this['referer'],
        $this['host'],
        $this['keywords']
        );

        $this->validatorSchema['email'] = new sfValidatorAnd(array(
            new sfValidatorEmail(),
            new sfValidatorDoctrineUnique(array(
                'model' => 'Newsletter',
                'column' => 'email'
            )),
        ));

        $this->validatorSchema['email']->setMessage('invalid', 'Vous êtes déjà inscrit à la newsletter');
    }
}
