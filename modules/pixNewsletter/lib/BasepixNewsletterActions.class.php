<?php
/**
 * Created by JetBrains PhpStorm.
 * Author: Nicolas R.
 * Date: 19/04/2011
 * Time: 09:23
 */

class BasepixNewsletterActions extends sfActions
{

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new NewsletterForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('message');
    }

    public function executeMessage(sfWebRequest $request){

    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $newsletter = $form->save();

            // recupere les infos de cookie
            $cookie = $this->getRequest()->getCookie(sfConfig::get('app_pixTools_cookie_name'));
            if ($cookie) {
                parse_str($cookie);
                $newsletter->referer = $referer;
                $newsletter->host = $host;
                $newsletter->keywords = $keywords;
                $newsletter->save();
            }

            // Mail au client
            $message = Swift_Message::newInstance()
                    ->setFrom(sfConfig::get('app_pixNewsletter_email_from'))
                    ->setTo($newsletter->getEmail())
                    ->setSubject(sfConfig::get('app_pixNewsletter_email_subject'))
                    ->setContentType('text/html')
                    ->setBody($this->getPartial('pixNewsletter/confirmation_client', array('newsletter' => $newsletter)));
            $this->getMailer()->send($message);

            if(sfConfig::get('app_pixNewsletter_email_to')){
                $message = Swift_Message::newInstance()
                    ->setFrom($newsletter->getEmail())
                    ->setTo(sfConfig::get('app_pixNewsletter_email_to'))
                    ->setSubject(sfConfig::get('app_pixNewsletter_email_subject'))
                    ->setContentType('text/html')
                    ->setBody($this->getPartial('pixNewsletter/confirmation_admin', array('newsletter' => $newsletter)));
                $this->getMailer()->send($message);
            }

            $this->setTemplate('message');
        }
    }

    public function executeConfirmation(sfWebRequest $request)
    {
        $email = base64_decode($request->getParameter('code'));

        $this->forward404Unless($newsletter = Doctrine_Core::getTable('Newsletter')->findOneByEmail(array($email)), sprintf('Object newsletter does not exist (%s).', $request->getParameter('code')));

        $newsletter->is_confirmed = true;
        $newsletter->save();
    }
}