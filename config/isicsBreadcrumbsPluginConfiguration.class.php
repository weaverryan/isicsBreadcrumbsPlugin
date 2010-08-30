<?php
/*
 * This file is part of the isicsBreadcrumbsPlugin package.
 * Copyright (c) 2008 ISICS.fr <contact@isics.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class isicsBreadcrumbsPluginConfiguration extends sfPluginConfiguration
{
  public function initialize()
  {
    $this->dispatcher->connect('template.filter_parameters', array('isicsBreadcrumbs', 'filterTemplateParameters'));

    // auto-enable any modules unless specified not to
    if (sfConfig::get('app_isics_breadcrumbs_enable_modules', true))
    {
      sfConfig::set('sf_enabled_modules', array_merge(
        sfConfig::get('sf_enabled_modules', array()),
        array('isicsBreadcrumbs')
      ));
    }
  }
}