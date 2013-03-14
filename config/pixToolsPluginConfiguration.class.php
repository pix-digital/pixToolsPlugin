<?php

/**
 * pixCmsPlugin configuration.
 * 
 * @package    pixCmsPlugin
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
    if (sfConfig::get('app_pix_tools_routes_register', true))
    {
        $enabledModules = sfConfig::get('sf_enabled_modules', array());
        if (in_array('pixNewsletter', $enabledModules))
        {
          $this->dispatcher->connect('routing.load_configuration', array('pixToolsRouting', 'listenToRoutingLoadConfigurationEvent'));
        }
    }
  }
}
