# file-to-array-converter

App which converts .csv .json .xml files into arrays and display as a table. 
Files are located under: public/files directory. 
File extensions can be controlled by .env file.

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
|       +-- FileToArrayStrategy
|   +-- Validator
+-- public
|   +-- files
+-- views
```

## Files to read

```
example.csv
example.json
example.xml
```

## Server

### Address

> http://localhost:8081

## Docker

### Run all services

> docker-compose up -d

### Opens shell for php

> docker-compose exec php bash


## Xdebug

Default configuration is for PHP Storm

```ini
xdebug.mode=develop,debug
xdebug.client_host=host.docker.internal
xdebug.start_with_request=yes
```

## Routes

Routes are stored in config/routes.json path. Example implementation:

```json
{
  "awesome-route": {
    "path": "/awesome",
    "controller": "AwesomeController",
    "action": "index"
  }
}
```
