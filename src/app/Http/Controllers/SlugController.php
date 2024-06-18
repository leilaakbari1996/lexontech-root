<?php

namespace Lexontech\Root\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SlugController extends SlugService
{
//    public static function createSlug($model, string $attribute, string $fromString, array $config = null): string
//    {
//        $model_name = $model;
//
//        if (is_string($model)) {
//            $model = new $model;
//        }
//        /** @var static $instance */
//        $instance = (new static())->setModel($model);
//
//
//        if ($config === null) {
//
//            $config = Arr::get($model->sluggable(), $attribute);
//
//            if ($config === null) {
//                $modelClass = get_class($model);
//                throw new \InvalidArgumentException("Argument 2 passed to SlugService::createSlug ['{$attribute}'] is not a valid slug attribute for model {$modelClass}.");
//            }
//
//        } elseif (!is_array($config)) {
//            throw new \UnexpectedValueException('SlugService::createSlug expects an array or null as the fourth argument; ' . gettype($config) . ' given.');
//        }
//
//        $config = $instance->getConfiguration($config);
//
//        $slug = $instance->generateSlug($fromString, $config, $attribute);
//        $slug = $instance->validateSlug($slug, $config, $attribute);
//        $slug = $instance->makeSlugUnique($slug, $config, $attribute,$model_name);
//
//        return $slug;
//    }

}
