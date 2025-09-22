<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Blade;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        if (app()->environment('testing')) {
            Blade::directive('vite', function ($expression) {
                return '';
            });
        }
    }
}
