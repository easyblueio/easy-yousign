# Symfony integration

## Configuration
Create YouSign env variables in your .env files and then add binding to services.yaml.
``` bash
# .env
YOUSIGN_API_KEY=your_yousign_token
# Staging
YOUSIGN_API_ENV=staging
# Production
YOUSIGN_API_ENV=prod
```

You can configure YouSign service factory and inject the service by dependency injection.
``` yaml
# services.yaml
services:
    Easyblue\YouSign\Factory\Factory:
        arguments:
            $apiKey: '%env(YOUSIGN_API_KEY)%'
            $env: '%env(YOUSIGN_API_ENV)%'
```

## Usage
In your service constructor inject YouSign Factory.

``` php
use Easyblue\YouSign\Factory\Factory;

/**
 * Your Signature class.
 */
class Signature
{
    private Factory $youSignFactory;

    public function __construct(Factory $youSignFactory)
    {
        $this->youSignFactory = $youSignFactory;
    }

    // Your logic
```