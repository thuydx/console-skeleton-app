# Console skeleton application
Start point to build console application in PHP

## Foldering
```
├── bin
│   └── console.php
├── composer.json
├── composer.lock
├── config
│   └── routes.php
├── src
│   └── Command
│       ├── Conf.php
│       ├── Database.php
│       └── Download.php
└── vendor
    └── ...
```

## Getting Started
```bash
$ git clone git@github.com:gianarb/console-skeleton-app
$ composer install
$ cd console-skeleton-app
$ bin/console
```
This is the entrypoint of this application, the output is
```bash
✔ ~/git/console-skeleton-app
09:44 $ bin/console
 Skeleton App, version 0.0.1

Available commands:

 autocomplete  Command autocompletion setup
 hello         Good morning!! This is a beautiful day
 help          Get help for individual commands
 version       Display the version of the script
```

## Hello command
```bash
✔ ~/git/console-skeleton-app 
09:44 $ bin/console hello --name=John
Skeleton App, version 0.0.1

Hi John, you have call me. Now this is an awesome day!
```

