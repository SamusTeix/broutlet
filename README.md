# Desafio BrOutlet

Copie a branch para a pasta da escolha:
```/bin/bash
git clone https://github.com/SamusTeix/broutlet.git broutlet
```

Entre na pasta:
```/bin/bash
cd broutlet
```

Suba os conteineres:
```/bin/bash
docker compose up --build -d
```

Crie a ```config/app.php``` baseada na ```config/app.default.php```:
```/bin/bash
cp config/app.default.php config/app.php
```

Configure o DB:

No novo arquivo ```config/app.php```, encontre a chave ```Datasources```, e em ```default```, atualize a configuração:

```php
'Datasources' => [
    'default' => [
        'className' => Connection::class,
        'driver' => Mysql::class,
        'persistent' => false,
        'host' => 'db',
        'port' => 3306,
        'username' => 'broutlet',
        'password' => 'root',
        'database' => 'dbbroutlet',
        'timezone' => 'UTC',
        'flags' => [],
        'cacheMetadata' => true,
        'log' => true,
        'quoteIdentifiers' => false,
        'url' => env('DATABASE_URL', null),
    ],
    ...
]
```

Acesse o conteiner do App:
```/bin/bash
docker exec -it broutlet-app-1 bash
```
O nome do container pode mudar dependendo de como o0 seu docker esta instalado, qual sistema operacioanal voce usa e etc. No meu caso, o nome ficou como ```broutlet-app-1```;

Atualize os pacotes via composer:
```/bin/bash
composer dump-autoload
composer update --ignore-platform-reqs
```

Rode as migrations e os Seeders:
```/bin/bash
bin/cake migrations migrate
bin/cake migrations seed
```

Saia do container:
```/bin/bash
exit
```

Agora o projeto já deve estar configurado e funcional:

Acesse pelo link: <a target="_blank">http://localhost:8000</a>
