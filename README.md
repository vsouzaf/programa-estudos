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
 
 
![Hello World](data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEYAAAAUCAAAAAAVAxSkAAABrUlEQVQ4y+3TPUvDQBgH8OdDOGa+oUMgk2MpdHIIgpSUiqC0OKirgxYX8QVFRQRpBRF8KShqLbgIYkUEteCgFVuqUEVxEIkvJFhae3m8S2KbSkcFBw9yHP88+eXucgH8kQZ/jSm4VDaIy9RKCpKac9NKgU4uEJNwhHhK3qvPBVO8rxRWmFXPF+NSM1KVMbwriAMwhDgVcrxeMZm85GR0PhvGJAAmyozJsbsxgNEir4iEjIK0SYqGd8sOR3rJAGN2BCEkOxhxMhpd8Mk0CXtZacxi1hr20mI/rzgnxayoidevcGuHXTC/q6QuYSMt1jC+gBIiMg12v2vb5NlklChiWnhmFZpwvxDGzuUzV8kOg+N8UUvNBp64vy9q3UN7gDXhwWLY2nMC3zRDibfsY7wjEkY79CdMZhrxSqqzxf4ZRPXwzWJirMicDa5KwiPeARygHXKNMQHEy3rMopDR20XNZGbJzUtrwDC/KshlLDWyqdmhxZzCsdYmf2fWZPoxCEDyfIvdtNQH0PRkH6Q51g8rFO3Qzxh2LbItcDCOpmuOsV7ntNaERe3v/lP/zO8yn4N+yNPrekmPAAAAAElFTkSuQmCC)

