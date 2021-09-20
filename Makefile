PHP := php
NGINX := nginx
MYSQL := mysql
DOCKER_COMPOSE_FILE := ./docker-compose.yml

start:
	@docker-compose -f ${DOCKER_COMPOSE_FILE} up -d --build

stop:
	@docker-compose -f ${DOCKER_COMPOSE_FILE} kill 
	@docker-compose -f ${DOCKER_COMPOSE_FILE} rm -f
	

logs:
	@docker-compose -f ${DOCKER_COMPOSE_FILE} logs ${PHP}

serverup:
	docker exec ${PHP} php bin/console doctrine:database:drop --if-exists --force
	docker exec ${PHP} php bin/console doctrine:database:create
	echo yes | docker exec ${PHP} php bin/console doctrine:migrations:migrate
	docker exec ${PHP} symfony server:start

