<?php

declare(strict_types=1);
/**
 * Dependency D
 * Implements Interface_A
 *
 * @since 0.2.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package PinkCrab\Core
 */

namespace PinkCrab\Core\Tests\Fixtures\DI;

use PinkCrab\Core\Tests\Fixtures\DI\Interface_A;

class Dependency_D implements Interface_A {
	public function foo() {
		return self::class;
	}
}