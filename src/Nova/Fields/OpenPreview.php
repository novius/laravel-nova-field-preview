<?php

namespace Novius\LaravelNovaFieldPreview\Nova\Fields;

use Closure;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\SupportsDependentFields;
use Laravel\Nova\Fields\Unfillable;

class OpenPreview extends Field implements Unfillable
{
    use SupportsDependentFields;

    public $component = 'text-field';

    public ?Closure $previewUrlCallback = null;

    public function __construct($name, $attribute = null, ?callable $resolveCallback = null)
    {
        parent::__construct($name, function () {
            if ($this->previewUrlCallback === null && method_exists($this->resource, 'previewUrl')) {
                $previewUrl = $this->resource->previewUrl();
            } else {
                $previewUrl = value($this->previewUrlCallback);
            }

            if (empty($previewUrl)) {
                return null;
            }

            return sprintf(
                '<a class="link-default inline-flex items-center justify-start" href="%s" target="_blank">%s <svg class="inline-block ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="18" height="18"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg></a>',
                $previewUrl,
                trans('laravel-nova-field-preview::messages.open'),
            );
        }, $resolveCallback);

        $this->withMeta(['asHtml' => true]);
    }

    public function previewUrl(callable $previewUrl): OpenPreview
    {
        $this->previewUrlCallback = $previewUrl;

        return $this;
    }
}
