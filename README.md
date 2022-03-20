# InExtremis

Website of InExtremis association

# dev env

### require

* php 7.4
* Composer
* Symfony CLI
* Docker
* Docker-compose
* NodesJs and npm

```bash
symfony check:requirements
```
### Lauch dev env

```bash
composer install
npm install
docker-compose up -d
npm  run watch
symfony serve -d
```

### Test
```bash
php bin/phpunit --testdox
```

### Node test