# Laravel Nova Field Preview

[![License: AGPL v3](https://img.shields.io/badge/License-AGPL%20v3-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)

## Introduction

This package allows you to add [Laravel Nova](https://nova.laravel.com/) field to open the front preview url of a ressource.

## Requirements

* Laravel Nova >= 4.0
* Laravel >= 8.0

## Installation

You can install the package via composer:

```bash
composer require novius/laravel-nova-field-preview
```

Add `OpenPreview` field on your Nova Resource:

```php
use Laravel\Nova\Resource;
use Novius\LaravelNovaFieldPreview\Nova\Fields\OpenPreview;

class Post extends Resource
{
    protected function fields(): array
    {
        return [
            OpenPreview::make('Preview link')
            ->previewUrl(function() {
                // Return here the preview url of the resource
                return $this->resource->previewUrl();
            }),
```

## Lang files

If you want to customize the lang files, you can publish them with:

```bash
php artisan vendor:publish --provider="Novius\LaravelNovaFieldPreview\LaravelNovaFieldPreviewServiceProvider" --tag="lang"
```

## Lint

Lint your code with Laravel Pint using:

```bash
composer run-script lint
```

## Licence

This package is under [GNU Affero General Public License v3](http://www.gnu.org/licenses/agpl-3.0.html) or (at your option) any later version.
