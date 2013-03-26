<?php
/**
 * Created by JetBrains PhpStorm.
 * Author: Nicolas R.
 * Date: 19/04/2011
 * Time: 09:23
 */
 
class BasepixContactComponents extends sfComponents{

    public function executeForm(sfWebRequest $request)
    {
        $this->form = new ContactForm();
    }
}