# isicsBreadcrumbsPlugin plugin

The isicsBreadcrumbsPlugin is a simple way to handle breadcrumbs in your applications.

isicsBreadcrumbsPlugin is working on Symfony 1.1 or greater.

## At a glance
  * A singleton who manages breadcrumbsItems. By default, a root item is present (text: Home, uri: @homepage)
  * A component who display the breadcrumbs

## License

The isicsBreadcrumbsPlugin is licensed under the GNU Lesser General Public License (LGPL).

## Installation

  * Install the plugin:

        [plain]
        $ symfony plugin:install isicsBreadcrumbsPlugin -s beta
        $ symfony cc
 
  * Enable the module isicsBreadcrumbs in settings.yml:
 
        [plain]
        all:
          .settings:
            enabled_modules: [default, isicsBreadcrumbs]
 
## Usage

Define the path in your templates:

    [plain]
    <?php $breadcrumbs->addItem('My action', 'myModule/myAction') ?>

    => Home > My action

If the action is deeper:

    [plain]
    <?php $breadcrumbs->addItem('My previous action', 'myModule/myPreviousAction') ?>
    <?php $breadcrumbs->addItem('My action', 'myModule/myAction') ?>
  
    => Home > My previous action > My action

Define the path in your actions:

    [plain]
    public function executeMyAction()
    {
      $this->getBreadcrumbs()->addItem('My action', 'myModule/myAction');

    => Home > My action

Include the breadcrumbs component (in the layout for instance):

    [plain]
    <p id="breadcrumbs">
      You are here :
      <?php include_component('isicsBreadcrumbs', 'show') ?>
    </p>

You can set your own root:

    [plain]
    <p id="breadcrumbs">
      You are here :
      <?php include_component('isicsBreadcrumbs', 'show', array(
        'root' => array('text' => 'Home', 'uri' => '@myHomepage')
      )) ?>
    </p>

## API
  * `void addItem(String $test, String $uri, Array $options)`: add an item at the end of the breadcrumbs
  * `void clearItems()`: erase all items
  * `isicsBreadcrumbs getInstance()`: retrieve the singleton instance
  * `array getItems()`: return an array of isicsBreadcrumbsItem
  * `void setRoot(String $test, String $uri)`: set root item. By default, a root item is already present (text: Home, uri: @homepage).
 
## Changelog

### 2010-06-23 | 0.9.9 beta
  * Added support for escaping strategy
  * Added options for root item in component
  
### 2010-06-23 | 0.9.8 beta
  * Added missing comments
  * Updated API
  
### 2010-06-23 | 0.9.7 beta
  * Added plugin configuration class
  * Added options to breadcrumbs items
  
### 2009-05-19 | 0.9.5 beta
  * Fixed package.xml
  * Updated README to markdown

### 2009-02-02 | 0.9.2 beta
  * Added `breadcrumbs` template shorcut (break compatibility with sf 1.0).
  * Added output escaping support.
  * Removed I18N support (hasn't to be handled here).

### 2008-07-29 | 0.9.1 beta
  * Added action caching support.
 
### 2008-06-23 | 0.9.0 beta
  * Initial public release.