<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait Sluggable
{

    public static function bootSluggable()
    {
        static::creating(function(Model $model){

            // Get default slug that the model carries.
            $slug = self::defaultSlug($model);
            
            // Ensure the slug is unique in the database.
            while($model::withTrashed()->where(self::getSlugConfig($model)['column'],$slug)->first()){
                $slug = Str::slug($slug.'-'.rand(1,5));
            };

            $model->slug = $slug;

        });

        static::updating(function(Model $model){
            
            // Get default slug that the model carries.
            $slug = self::defaultSlug($model);

            // Ensure uniqueness of slug only if it has been modified.
            if($model->{self::getSlugConfig($model)['column']} != $model->getOriginal(self::getSlugConfig($model)['column']))
            {
                while($model::withTrashed()->where('slug',$slug)->first()){
                    $slug = Str::slug($slug.'-'.rand(1,5));
                };
            }

            $model->slug = $slug;

        });
    }


    public static function defaultSlug($model)
    {
        // Determine model's default slug value from its sluggable column property, or source property.
        $slug = $model->{self::getSlugConfig($model)['column']} ?? $model->{self::getSlugConfig($model)['source']};
       
        return Str::slug($slug);
    }


    public static function getSlugConfig($model)
    {
        // Resolve model's sluggable config or fallback to the app's sluggable config.
        return method_exists($model, 'sluggable') ? $model->sluggable() : config('sluggable.model');
    }

}