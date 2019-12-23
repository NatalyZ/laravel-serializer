<?php
namespace LaravelSerializer;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Illuminate\Support\ServiceProvider;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

class LaravelSerializerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register JMS annotations
        AnnotationRegistry::registerLoader('class_exists');
        $this->app->singleton(Serializer::class, function() {
            return SerializerBuilder::create()->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )->build();
        });
        // for easy access
        $this->app->singleton('serializer', Serializer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}