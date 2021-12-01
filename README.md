# file-to-array-converter

App which converts .csv .json .xml files into arrays and display as a table. Files are located under: public/files directory.

- PHP7
- Docker

## Directory structure

```
.
+-- config
+-- docker
+-- src
|   +-- Controller
|   +-- Exception
|   +-- Factory
|   +-- Object
|   +-- Util
|   +-- Validator
+-- public
|   +-- files
+-- views
```

## Docker

### Run all services

> docker-compose up -d

### Opens shell for php

> docker exec -ti php bash


## XDEBUG

Default configuration is for PHP Storm

```ini
xdebug.mode=develop,debug
xdebug.client_host=host.docker.internal
xdebug.start_with_request=yes
```
