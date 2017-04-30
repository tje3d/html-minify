# Laravel 5 HTML Minify
`This package is originally from https://github.com/fitztrev/laravel-html-minify i just updated the package and made it compatible with laravel 5`, And i forked and make it simple 😁

## About

This package compresses the HTML output from your Laravel 5 application, seamlessly reducing the overall response size of your pages.

Other scripts that I've seen will compress the HTML output on-the-fly for each request. Instead, this package extends the Blade compiler to save the compiled template files to disk in their compressed state, reducing the overhead for each request.

## Why?

Even with gzip enabled, there is still an improvement in the response size for HTML content-type documents.

Test Page | w/o Gzip | w/ Gzip | w/ Gzip + Laravel HTML Minify
--- | ---: | ---: | :---:
**#1** | 8,039 bytes | 1,944 bytes | **1,836 bytes** (5.6% improvement)
**#2** | 377,867 bytes | 5,247 bytes | **4,314 bytes** (17.8% improvement)

## Installation

1. composer require tje3d/html-minify
1. Add `Tje3d\HtmlMinify\HtmlMinifyServiceProvider::class` to the list of providers in **config/app.php**.
1. Publish your config with `php artisan vendor:publish` command
1. php artisan view:clear


### Options

- **`enabled`** - *boolean*, default **true**