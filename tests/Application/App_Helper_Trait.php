<?php

declare(strict_types=1);

/**
 * Helper trait for all App tests
 * Includes clearing the internal state of an existing instance.
 *
 * @since 0.4.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package PinkCrab\Core
 */

namespace PinkCrab\Core\Tests\Application;

use PinkCrab\Core\Application\App;
use Dice\Dice;

use PinkCrab\Loader\Loader;

use PinkCrab\Core\Services\Dice\PinkCrab_WP_Dice_Adaptor;

use PinkCrab\Core\Services\Registration\Registration_Service;

use Gin0115\WPUnit_Helpers\Objects;


trait App_Helper_Trait {

	/**
	 * Resets the any existing App isntance with default properties.
	 *
	 * @return void
	 */
	protected static function unset_app_instance(): void {
		$app = new App();
		Objects::set_property( $app, 'app_config', null );
		Objects::set_property( $app, 'container', null );
		Objects::set_property( $app, 'registration', null );
		Objects::set_property( $app, 'loader', null );
		Objects::set_property( $app, 'booted', false );
		$app = null;
	}

	/**
	 * Returns an instance of app (not booted) populated with actual
	 * service objects.
	 *
	 * No data has been bound to any internal services
	 *
	 * Is a plain and basic instance.
	 *
	 * @return App
	 */
	protected function pre_populated_app_provider(): App {
		// Build and populate the app.
		$app          = new App();
		$registration = new Registration_Service();
		$container    = new PinkCrab_WP_Dice_Adaptor( new Dice() );
		$loader       = new Loader();

		$app->set_container( $container );
		$app->set_registration_services( $registration );
		$app->set_loader( $loader );
		$app->set_app_config( include FIXTURES_PATH . '/Application/settings.php' );

		return $app;
	}

}
