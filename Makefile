COMPOSER = composer

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
tools:
	mkdir $@

tools/phpmd-%.phar: tools
	rm -f tools/phpmd-*.phar
	curl -LSso $@ \
		"https://github.com/phpmd/phpmd/releases/download/$*/phpmd.phar"

.PHONY: phpmd
phpmd: tools/phpmd-2.11.1.phar
	php $< $(arguments)

.PHONY: apply-phpmd
apply-phpmd:
	$(MAKE) phpmd arguments="src text .phpmd.xml"

tools/phpcpd-%.phar: tools
	rm -f tools/phpcpd-*.phar
	curl -LSso $@ \
		"https://phar.phpunit.de/phpcpd-$*.phar"

.PHONY: phpcpd
phpcpd: tools/phpcpd-6.0.3.phar
	php $< $(arguments)

.PHONY: apply-phpcpd
apply-phpcpd:
	$(MAKE) phpcpd arguments="src"

tools/phpstan-%.phar: tools
	rm -f tools/phpstan-*.phar
	curl -LSso $@ \
		"https://github.com/phpstan/phpstan/releases/download/$*/phpstan.phar"

.PHONY: phpstan
phpstan: tools/phpstan-1.3.0.phar
	php $< $(arguments)

.PHONY: apply-phpstan
apply-phpstan:
	$(MAKE) phpstan arguments="analyse --memory-limit=4G -l 8 src"

tools/php-cs-fixer-%.phar: tools
	rm -f tools/php-cs-fixer-*.phar
	curl -LSso $@ \
		"https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/download/v$*/php-cs-fixer.phar"
	chmod +x tools/php-cs-fixer-*.phar

.PHONY: php-cs-fixer
php-cs-fixer: tools/php-cs-fixer-3.4.0.phar
	php $< $(arguments)

.PHONY: check-php-cs
check-php-cs:
	$(MAKE) php-cs-fixer arguments="fix --dry-run --using-cache=no --verbose --diff"

.PHONY: apply-php-cs
apply-php-cs:
	$(MAKE) php-cs-fixer arguments="fix --using-cache=no --verbose --diff"

pre-commit: apply-phpmd apply-phpcpd apply-php-cs apply-phpstan

.DEFAULT_GOAL := help

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help
