# Kurz PHP - lekce 7

* Úvod do nástroje Composer
* Základy práce se Symfony

## Jak zprovoznit aplikaci

### Instalace závislostí
`composer install`

### Konfigurace databáze
* nejprve je nutné v menu Project povolit show/hide hidden files kvůli editaci souboru .env
* v .env souboru je nutné doplnit konfiguraci databáze `DATABASE_URL=mysql://root:@127.0.0.1:3306/symfonydatabase`

### Start databáze
`sudo service mysql start`

### Vytvoření databáze
`php bin/console doctrine:database:create`

### Založení tabulek
`php bin/console doctrine:schema:update --force`