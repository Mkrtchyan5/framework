<?php

spl_autoload_register(function ($namespace) {

    require $namespace . '.php';
});