Sistema de Programa de Estudos
--------------------------
Para executar o projeto

1. Para o subir o servidor php-fpm
 ``` 
# docker-compose up --build -d
 ```
1.1. Executar o composer install
 ```  
# docker-compose exec php composer install
```
1.1 Para limpar o Banco de Dados MySql
 ```
# docker-compose exec php bin/console doctrine:schema:drop --force
 ```
1.2 Para criar a estrutura de tabelas
 ```
# docker-compose exec php bin/console doctrine:schema:create
# docker-compose exec php bin/console doctrine:migrations:migrate
 ```

1.3 Para executar a carga de dados
```       
# docker-compose exec php bin/console doctrine:fixtures:load 
 ```

Utilização da API
-------------------

*  Listar Bancas
 ```
    GET - http://symfony.localhost/api/banca/
 ```

*  Listar Órgãos
 ```
    GET - http://symfony.localhost/api/orgao/
 ```

* Gerar Programa de Estudos
 ```
    GET - http://symfony.localhost/api/programa_estudo/?orgao=idDoOrgao&banca=idDaBanca
 ```