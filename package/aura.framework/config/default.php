<?php
/**
 * Instance params and setter values.
 */
$controllers =& $di->params['aura\cli\ControllerFactory']['controllers'];
$controllers['aura.framework.make-test']     = 'aura\framework\MakeTest';
$controllers['aura.framework.run-tests']     = 'aura\framework\RunTests';

$di->setter['aura\framework\MakeTest'] = array(
    'setInflect' => $di->lazyGet('inflect'),
    'setSystem'  => $di->lazyGet('system'),
);

$di->setter['aura\framework\RunTests'] = array(
    'setPhpunit' => str_replace('/', DIRECTORY_SEPARATOR, "php " . dirname(__DIR__) . "/PHPUnit-3.4.15/phpunit.php"),
    'setSystem'  => $di->lazyGet('system'),
);

/**
 * Dependency services.
 */
$di->set('inflect', function() {
    return new aura\framework\Inflect;
});

$di->set('system', function() use ($system) {
    return new aura\framework\System($system);
});
