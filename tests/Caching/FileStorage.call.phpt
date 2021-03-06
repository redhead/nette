<?php

/**
 * Test: Nette\Caching\FileStorage call().
 *
 * @author     David Grudl
 * @package    Nette\Caching
 * @subpackage UnitTests
 */

use Nette\Caching\Cache;



require __DIR__ . '/../bootstrap.php';



// temporary directory
define('TEMP_DIR', __DIR__ . '/tmp');
TestHelpers::purge(TEMP_DIR);



function mockFunction($x, $y)
{
	$GLOBALS['called'] = TRUE;
	return $x + $y;
}


$cache = new Cache(new Nette\Caching\FileStorage(TEMP_DIR));

$called = FALSE;
Assert::same( 55, $cache->call('mockFunction', 5, 50) );
Assert::true( $called );

$called = FALSE;
Assert::same( 55, $cache->call('mockFunction', 5, 50) );
Assert::false( $called );
