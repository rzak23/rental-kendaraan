<?php
/**
 * Part of Cli for CodeIgniter
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/codeigniter-cli
 *
 * Based on http://codeinphp.github.io/post/codeigniter-tip-accessing-codeigniter-instance-outside/
 * Thanks!
 */

$cwd = getcwd();
chdir(__DIR__);

define('ENVIRONMENT', $_SERVER['CI_ENV'] ?? 'development');

$system_path        = 'system';
$application_folder = 'application';
$doc_root           = 'public';

if (realpath($system_path) !== false) {
    $system_path = realpath($system_path) . '/';
}
$system_path = rtrim($system_path, '/') . '/';

define('BASEPATH', str_replace("\\", "/", $system_path));
define('FCPATH', $doc_root . '/');
define('APPPATH', $application_folder . '/');
define('VIEWPATH', $application_folder . '/views/');

require(BASEPATH . 'core/Common.php');

if (file_exists(APPPATH . 'config/' . ENVIRONMENT . '/constants.php')) {
    require(APPPATH . 'config/' . ENVIRONMENT . '/constants.php');
} else {
    require(APPPATH . 'config/constants.php');
}

$charset = strtoupper(config_item('charset'));
ini_set('default_charset', $charset);

if (extension_loaded('mbstring')) {
    define('MB_ENABLED', TRUE);
    // mbstring.internal_encoding is deprecated starting with PHP 5.6
    // and it's usage triggers E_DEPRECATED messages.
    @ini_set('mbstring.internal_encoding', $charset);
    // This is required for mb_convert_encoding() to strip invalid characters.
    // That's utilized by CI_Utf8, but it's also done for consistency with iconv.
    mb_substitute_character('none');
} else {
    define('MB_ENABLED', FALSE);
}

// There's an ICONV_IMPL constant, but the PHP manual says that using
// iconv's predefined constants is "strongly discouraged".
if (extension_loaded('iconv')) {
    define('ICONV_ENABLED', TRUE);
    // iconv.internal_encoding is deprecated starting with PHP 5.6
    // and it's usage triggers E_DEPRECATED messages.
    @ini_set('iconv.internal_encoding', $charset);
} else {
    define('ICONV_ENABLED', FALSE);
}

$GLOBALS['CFG'] = & load_class('Config', 'core');
$GLOBALS['UNI'] = & load_class('Utf8', 'core');
$GLOBALS['SEC'] = & load_class('Security', 'core');

load_class('Loader', 'core');
load_class('Router', 'core');
load_class('Input', 'core');
load_class('Lang', 'core');

require_once 'vendor/autoload.php';
$repository = Dotenv\Repository\RepositoryBuilder::createWithNoAdapters()
    ->addAdapter(Dotenv\Repository\Adapter\EnvConstAdapter::class)
    ->addWriter(Dotenv\Repository\Adapter\PutenvAdapter::class)
    ->immutable()
    ->make();
$dotenv = Dotenv\Dotenv::create($repository, './');
$dotenv->safeLoad();
require(BASEPATH . 'core/Controller.php');

function &get_instance()
{
    return CI_Controller::get_instance();
}

chdir($cwd);

return new CI_Controller();
