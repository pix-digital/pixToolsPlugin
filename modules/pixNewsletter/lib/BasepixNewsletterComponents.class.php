<?php
/**
 * Created by JetBrains PhpStorm.
 * Author: Nicolas R.
 * Date: 20/04/2011
 * Time: 16:03
 */
 
class BasepixNewsletterComponents extends sfComponents{

    public function executeForm(sfWebRequest $request){

        $this->form = new NewsletterForm();
    }
}