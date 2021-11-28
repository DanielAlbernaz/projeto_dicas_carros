###### Documentação para rodar configurar e usar a aplicação

```
git clone https://github.com/DanielAlbernaz/projeto_dicas_carros.git
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
```

Dentro do nosso .ENV da pasta raiz do projeto configuramos nossa base de dados de acordo com o laradock (container)

.ENV pasta raiz:

- DB_CONNECTION=mysql
- DB_HOST=mysql
- DB_PORT=3306
- DB_DATABASE=projeto_dicas
- DB_USERNAME=root
- DB_PASSWORD=root

###### Configurando o Docker (laradock)
Dentro da pasta raiz do projeto, rodar comandos para configuração do laradock:

- git clone https://github.com/Laradock/laradock.git
- cd laradock
- cp .env.example .env

###### Agora subistituir as configurações (dentro do .ENV no diretorio laradock) dos container usado abaixo para não haver conflitos de portas:


Container usados NGINX, MYSQL, PHP MY ADMIN

.ENV laradock:
###### NGINX 

- NGINX_HOST_HTTP_PORT=8888
- NGINX_HOST_HTTPS_PORT=543
- NGINX_HOST_LOG_PATH=./logs/nginx/
- NGINX_SITES_PATH=./nginx/sites/
- NGINX_PHP_UPSTREAM_CONTAINER=php-fpm
- NGINX_PHP_UPSTREAM_PORT=9000
- NGINX_SSL_PATH=./nginx/ssl/

###### MYSQL 

- MYSQL_VERSION=latest
- MYSQL_DATABASE=projeto_dicas
- MYSQL_USER=default
- MYSQL_PASSWORD=secret
- MYSQL_PORT=8306
- MYSQL_ROOT_PASSWORD=root
- MYSQL_ENTRYPOINT_INITDB=./mysql/docker-entrypoint-initdb.d

###### PHP MY ADMIN 

-  Accepted values: mariadb - mysql

- PMA_DB_ENGINE=mysql

 Credentials/Port:

- PMA_USER=default
- PMA_PASSWORD=secret
- PMA_ROOT_PASSWORD=secret
- PMA_PORT=1010
- PMA_MAX_EXECUTION_TIME=600
- PMA_MEMORY_LIMIT=256M
- PMA_UPLOAD_LIMIT=2G

###### Subistituir porta do WORKSPACE_SSH_PORT para não conflitar com outro docker rodando:

WORKSPACE_SSH_PORT=9999

Obs: caso algun container não suba substitua a porta do container em questão para corrigir o erro

###### Agora ainda dentro do diretorio laradock vamos levantar os container: 

- docker-compose up -d nginx mysql phpmyadmin 

###### Após criar o banco no phpmyadmin com o nome de projeto_dicas

PHP my admin: http://127.0.0.1:1010/

- Servidor: mysql
- Utilizador : root
- Palavra-passe: root

###### Logo em seguida o banco criado rodamos nossa migrates e seeders, para usarmos dentro da pasta laradock rodamos o comando para abrir o terminal bash do work space:

- docker-compose exec --user=laradock workspace bash

###### Logo em seguida rodamos as migrations e seeders para criar tabelas e popular nosso banco:

- php artisan migrate 
- php artisan db:seed

###### A aplicação esta disponível no endereço: 

http://127.0.0.1:8888/

###### Usuarios e senha disponíveis para teste:

- User: daniel@daniel
- Password: 12345678

- User: ruth@ruth
- Password: 12345678

- User: lucas@lucas
- Password: 12345678

- User: Paulo@Paulo
- Password: 12345678



