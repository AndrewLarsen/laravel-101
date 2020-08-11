# Oppsett

Klon hele prosjektet ved bruk av git i terminal direkte, eller ved bruk av en klient som sourcetree.
Eller du kan laste ned hele prosjektet som en zip fil og pakke ut der du ønsker.

### Installasjon

For å komme i gang åpner du et terminal vindu og navigerer til src mappen, og skriver følgende:

```php
npm install && npm run watch
```

Deretter åpner du enda et nytt terminal vindu og skriver følgende:
```php
composer install && php artisan key:generate && php artisan optimize && php artisan serve
```

### Stier som er verdt å nevne

```php
/src/app/ (mappe)
    Her skal modellene dine være.
    Eks. /src/app/Listitem.php

/src/app/Http/Controllers/ (mappe)
    Her skal controllerne dine være.
    Eks. /src/app/Http/Controllers/ListitemController.php

/src/database/migrations/ (mappe)
    Her skal alle db migreringsfiler være.
    Eks. /src/database/migrations/2020_08_08_184541_create_listitems_table.php

/src/resources/ (mappe)
    Her skal alt av views, scss, js og oversettinger være.
    Eks. /src/resources/views/list.blade.php

/src/.env (fil)
    Det her er config filen din.

/test.php (fil)
    Her lagde vi test klassen vår (Animal).
```

### Kommandoer som er verdt å nevne:

```php
php artisan migrate (gjennomfører db endringer om du har laget nye migreringsfiler)
php artisan optimize (fjerner alt av cache)

npm run watch (kjør npm dev i bakgrunn, hele tiden)
php artisan serve (start webserver, siden kan nås via localhost:8000)

npm install (installere alle npm pakker)
composer install (installere alle composer pakker)
```

Kommandoer kjøres fra /src/ mappen.
