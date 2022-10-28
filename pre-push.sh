./vendor/bin/phpstan analyze

./vendor/bin/phpunit --coverage-clover clover.xml && ./vendor/bin/coverage-check clover.xml 100