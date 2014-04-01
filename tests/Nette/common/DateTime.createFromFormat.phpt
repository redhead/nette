<?php

/**
 * Test: Nette\DateTime test.
 *
 * @author     David Grudl
 */

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


date_default_timezone_set('Europe/Prague');

Assert::type( '\Nette\DateTime', Nette\DateTime::createFromFormat('Y-m-d H:i:s', '2050-08-13 11:40:00') );
Assert::type( '\Nette\DateTime', Nette\DateTime::createFromFormat('Y-m-d H:i:s', '2050-08-13 11:40:00', new DateTimeZone('Europe/Prague')) );

Assert::error(function(){
	Nette\DateTime::createFromFormat('Y-m-d H:i:s', '2050-08-13 11:40:00', null);
}, 'Nette\InvalidArgumentException', 'Nette\DateTime::createFromFormat() expects parameter 3 to be DateTimeZone, NULL given' );

Assert::error(function(){
	Nette\DateTime::createFromFormat('Y-m-d H:i:s', '2050-08-13 11:40:00', 'Europe/Prague');
}, 'Nette\InvalidArgumentException', 'Nette\DateTime::createFromFormat() expects parameter 3 to be DateTimeZone, string given' );

Assert::same( '2050-08-13 11:40:00', (string) Nette\DateTime::createFromFormat('Y-m-d H:i:s', '2050-08-13 11:40:00') );
