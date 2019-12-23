<?php

namespace LaravelSerializer;


use Illuminate\Support\Facades\Facade;

class LaravelSerializerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'serializer';
    }
}