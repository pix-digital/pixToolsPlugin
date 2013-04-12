<?php

/**
 * PluginContact form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginContactForm extends BaseContactForm
{
    public function configure()
    {
        unset($this['created_at'],
        $this['updated_at'],
        $this['referer'],
        $this['host'],
        $this['keywords']
        );


        $this->widgetSchema['title'] = new sfWidgetFormChoice(array('choices' => Contact::$personType,
                                                                   'expanded' => false,
                                                              ));
        $this->validatorSchema['title'] = new sfValidatorChoice(array('choices' => array_keys(Contact::$personType)
                                                                ));

        $this->validatorSchema['email'] = new sfValidatorEmail();

        $this->widgetSchema->setLabels(array(
          'title'          => 'label_contact_title',
          'lastname'       => 'label_contact_lastname',
          'firstname'      => 'label_contact_firstname',
          'phone'          => 'label_contact_phone',
          'email'          => 'label_contact_email',
          'subject'        => 'label_contact_subject',
          'comments'       => 'label_contact_comments',
      ));
    }
}
