[![alert-dengue](https://wicnews.com/wp-content/uploads/2019/01/dengue-logo-300x300.jpg)](#)

---

# Descricao do Projeto


API desenvolvida para alimentar o APP - HackDoidos

# Tecnologias Utilizadas

- PHP
- LARAVEL
- MYSQL



# Configuracao e Execução do Projeto

#### - composer

Para execução deste projeto com composer, será necessário ter o [Composer](https://getcomposer.org),
então tenha certeza que o tenha instalado localmente.

Primeiramente clone este repositório.
Na pasta do projeto, execute o comando:

```
composer install

```

#### - mysql/mariaDB 

Para execução deste projeto com composer, será necessário ter o [Mysql](https://dev.mysql.com/doc/mysql-shell/8.0/en/),
então tenha certeza que o tenha instalado localmente.

```

create database hackdoidos;

```


Com esse comando você vai conseguir criar o banco para projeto.

Logo após a finalizaçâo, execute os comandos:

```
php artisan migrate:refresh --seed

php artisan key:generate

php artisan serve

```

Abra [http://localhost:8000](http://localhost:8000) para visualizar em seu navegador.

```
http://localhost:3000
```
