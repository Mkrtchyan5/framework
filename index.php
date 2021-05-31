<?php

define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);

require sprintf('%sbootstrap%sautoload.php', ROOT, DIRECTORY_SEPARATOR);

\engine\Application::run();