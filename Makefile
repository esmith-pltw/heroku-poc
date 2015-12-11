current_branch = `git symbolic-ref --short HEAD`
heroku_remote = heroku

heroku_fork_from = estel-dev-template
heroku_fork_to = pltw-`whoami`-dev

all:

fork:
	if [ -z "`git remote | grep $(heroku_remote)`" ]; then \
		heroku fork --from $(heroku_fork_from) --to $(heroku_fork_to); \
		heroku git:remote $(heroku_fork_to); \
	fi

deploy: fork
	git push heroku $(current_branch):master
	heroku run 'php app/console doctrine:migrations:migrate --no-interaction'
