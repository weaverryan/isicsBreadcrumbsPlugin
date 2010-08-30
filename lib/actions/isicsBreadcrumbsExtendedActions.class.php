<?php

/**
 * Effectively extends the sfActions class by hooking into the
 * component.method_not_found event.
 */
class isicsBreadcrumbsExtendedActions
{
  /**
   * The current action class being extended
   *
   * @var sfAction
   */
  protected $_action;

  /**
   * Shortcut to get the breadcrumbs object
   *
   * @return isicsBreadcrumbs
   */
  public function getBreadcrumbs()
  {
    return isicsBreadcrumbs::getInstance();
  }

  /**
   * Listens to the component.method_not_found event to effectively
   * extend the actions class
   */
  public function listenComponentMethodNotFound(sfEvent $event)
  {
    $this->_action = $event->getSubject();
    $method = $event['method'];
    $arguments = $event['arguments'];

    if (method_exists($this, $method))
    {
      $result = call_user_func_array(array($this, $method), $arguments);

      $event->setReturnValue($result);

      return true;
    }
    else
    {
      return false;
    }
  }
}