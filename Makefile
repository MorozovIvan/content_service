up:
	docker-compose up -d
down: stop
stop:
	docker-compose down
restart: down up
