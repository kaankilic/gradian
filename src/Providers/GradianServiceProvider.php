<?php 
namespace Kaankilic\Gradian;
use Illuminate\Support\ServiceProvider;

class GradianServiceProvider extends ServiceProvider{
	protected $defer = false;
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	*/
	public function boot(\Illuminate\Routing\Router $router){
		$this->publishes([
			__DIR__.'/../config/gradian.php' => config_path('gradian.php'),
		]);
	}
	/**
	* Register the application services.
	*
	* @return void
	*/
	public function register(){
		$this->mergeConfigFrom(__DIR__ . '/../config/gradian.php', 'gradian');
		return array('Gradian');
	}
}

?>