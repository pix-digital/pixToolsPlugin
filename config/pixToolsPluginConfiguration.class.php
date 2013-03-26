<?php

/**
 * pixToolsPlugin configuration.
 *
 * @package    pixToolsPlugin
 * @subpackage config
 * @author     Nicolas Ricci <nr@agencepix.com>
 */
class pixToolsPluginConfiguration extends sfPluginConfiguration
{
    /**
     * @see sfPluginConfiguration
     */
    public function initialize()
    {
        if (sfConfig::get('app_pixTools_routes_register', true)) {
            $enabledModules = sfConfig::get('sf_enabled_modules', array());
            if (in_array('pixNewsletter', $enabledModules)) {
                $this->dispatcher->connect('routing.load_configuration', array('pixToolsRouting', 'listenToNewsletterRoutingEvent'));
            }
            if (in_array('pixContact', $enabledModules)) {
                $this->dispatcher->connect('routing.load_configuration', array('pixToolsRouting', 'listenToContactRoutingEvent'));
            }
        }
    }
}
