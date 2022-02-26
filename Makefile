# These next lines are explained here: https://medium.com/lebouchondigital/passer-des-arguments-%C3%A0-une-target-gnu-make-1ddab618c32f
SUPPORTED_COMMANDS := commit opush tf
SUPPORTS_MAKE_ARGS := $(findstring $(firstword $(MAKECMDGOALS)), $(SUPPORTED_COMMANDS))
ifneq "$(SUPPORTS_MAKE_ARGS)" ""
  COMMAND_ARGS := $(wordlist 2,$(words $(MAKECMDGOALS)),$(MAKECMDGOALS))
  COMMAND_ARGS := $(subst :,\:,$(COMMAND_ARGS)) # Allow to use ":" in our command
  $(eval $(COMMAND_ARGS):;@:)
endif


fresh:
	@echo Start Refreshing the database.
	php artisan migrate:fresh
	php artisan db:seed
	@echo Finish Refreshing the database.

setup:
	@echo Setting up your laravel project...
	composer update --ignore-platform-reqs
	cp .env.example .env
	# cp laravel-echo-gserver-example.json laravel-echo-server.json
	php artisan key:generate
	php artisan telescope:install
	# php artisan horizon:install
	yarn i
	yarn run dev
	@echo Your project was set up. Do not forget to configure the database in the .env file and the run: make db--refresh

dump:
	composer dump-autoload --ignore-platform-reqs

test:
	php artisan test --parallel

tf: ## usage: make tf m=name
	php artisan test --filter $(m)

puf: ## usage: make puf m=name
	"vendor/bin/phpunit" --filter $(m)

q:
	php artisan queue:work --queue=high,default

echo:
	laravel-echo-server start

cpush: ## [Commit push]: Commit and push on a branch 'b' with the message 'm'. Usage: make cpush m="Commit Message" b="current branch"
	make commit m="$(m)"
	git push origin $(b)

opush: ## [Only Push]: Push without committing on branch 'b'.
	git push origin $(b)

u--master: ## Update the master branch from another branch. | Usage: make u--master m="Commit Message" b="current branch"
	echo "committing branch $(b) with the message $(m) and set the 'master' branch up to date with the branch $(b)."
	echo "Commit and push on branch develop"
	make cpush b=$(b) m="$(m)"

	echo "Set the master branch up to date with the branch $(b)."
	git checkout master
	git pull origin $(b)
	git push origin master
	echo "Master branch status after commit and push."
	git status

	echo "Switch back to the branch $(b)"
	git checkout $(b)

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-10s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
