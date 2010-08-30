<?php

class isicsBreadcrumbsItem
{
  protected $text;
  protected $uri;
  protected $options;

  /**
   * Constructor
   *
   */
  public function __construct($text, $uri = null, $options = array())
  {
    $this->text = $text;
    $this->uri = $uri;
    $this->options = $options;
  }

  /**
   * Retrieve the uri of the item
   *
   */
  public function getUri()
  {
    return $this->uri;
  }

  /**
   * Retrieve the text of the item
   *
   */
  public function getText()
  {
    return $this->text;
  }

  /**
   * Retrieve the options of the item
   *
   */
  public function getOptions()
  {
    return $this->options;
  }
}