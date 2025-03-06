# Makefile

install:
	composer install

start:
	./bin/brain-games

valid:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-even:
	./bin/brain-even