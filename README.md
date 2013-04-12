pixToolsPlugin
==============

## Introduction

This plugin is born from the recurrent needs of having to create basic modules such as contact form and newsletter subscription.
This plugin only supports Doctrine ORM.

## Installation
    
    cd /your/symfony/project
    git clone git://github.com/pix-digital/pixToolsPlugin.git plugins/pixToolsPlugin

Enable the plugin in your ProjectConfiguration.class.php

    [php]
    public function setup()
    {
        $this->enablePlugin('pixToolsPlugin');
    }
    
Rebuild your model

    ./symfony doctrine:build --all-classes

Rebuild SQL and import all the new tables in your database (or use the migrate task if you prefer)

    ./symfony doctrine:build-sql

Enable modules according to your needs in your application settings.yml (see below for each configuration)

## Modules

### pixContact

The module creates a basic contact form and handles email confirmation.


Enable the module in your settings.yml

    [yaml]
    all:
      .settings:
        enabled_modules:
          - pixContact

Configure the app.yml

    [yaml]
    pixContact:
      email_subject: '[client] Formulaire de contact'
      email_from: you@domain.com
      email_to: you@domain.com
      email_bcc: [you@domain.com]
      
Remember you can extend the model if you wish in your own schema.yml

To include the contact form in your templates, you can use the following component

    [php]
    <?php include_component('pixContact', 'form'); ?>


### pixNewsletter

The module handles a simple newsletter subscription with a confirmation email sent to the client to validate the registration.


Enable the module in your settings.yml

    [yaml]
    all:
      .settings:
        enabled_modules:
          - pixNewsletter

Configure the app.yml

    [yaml]
    pixNewsletter:
      email_subject: '[client] Inscription newsletter'
      email_from: you@domain.com
      email_to: you@domain.com
      email_bcc: [you@domain.com]
      
Remember you can extend the model if you wish in your own schema.yml


          
