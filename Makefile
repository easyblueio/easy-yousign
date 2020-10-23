COMPOSER		= composer

##
## Tests
## -----
##

test: ## Run unit and functional tests
test: vendor
	php ./vendor/bin/phpunit

test-coverage: vendor
	php ./vendor/bin/phpunit  --coverage-html build/coverage

composer.lock: composer.json
	$(COMPOSER) update --lock --no-scripts --no-interaction

vendor: composer.lock
	$(COMPOSER) install

composer-require:
	$(COMPOSER) require $(filter-out $@,$(MAKECMDGOALS))

composer-require-dev:
	$(COMPOSER) require --dev $(filter-out $@,$(MAKECMDGOALS))

composer-update:
	$(COMPOSER) update

##
## Quality assurance
## -----------------
##
phpmd: vendor ## PHP Mess Detector (https://phpmd.org)
	php ./vendor/bin/phpmd src text .phpmd.xml --exclude src/Migrations

php_codesnifer: vendor ## PHP_CodeSnifer (https://github.com/squizlabs/PHP_CodeSniffer)
	php ./vendor/bin/phpcs -v --standard=.phpcs.xml src

phpcpd: vendor ## PHP Copy/Paste Detector (https://github.com/sebastianbergmann/phpcpd)
	php ./vendor/bin/phpcpd src

phpstan: vendor ## PHP stan (https://github.com/phpstan/phpstan)
	php ./vendor/bin/phpstan analyse -l 4

php-cs-fixer: vendor ## php-cs-fixer (http://cs.sensiolabs.org)
	php ./vendor/bin/php-cs-fixer fix --dry-run --using-cache=no --verbose --diff

apply-php-cs-fixer: vendor ## apply php-cs-fixer fixes
	php ./vendor/bin/php-cs-fixer fix --using-cache=no --verbose --diff

pre-commit: phpmd phpcpd apply-php-cs-fixer phpstan

.DEFAULT_GOAL := help

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help
