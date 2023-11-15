# PhpScript\PrettyError
Simplified way to handle PHP errors with a pretty interface

## Installation

It's recommended that you use [Composer](https://getcomposer.org/) to install SweetView.

```bash
$ composer require php-script/pretty-error
```
## Register PrettyError

```php
<?php

use PhpScript\PrettyError\PrettyError;

require_once __DIR__ . '/vendor/autoload.php';

// register PrettyError for Development Mode
PrettyError::register(PrettyError::ENV_DEVELOPMENT);

// register PrettyError for Production Mode
PrettyError::register(PrettyError::ENV_PRODUCTION);

// ...
```
That's it..