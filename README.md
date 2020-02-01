# Créations PHP

## shell.php

Cette page permet de simuler le comportement d'un terminal. Le but était de pouvoir exécuter des commandes basiques sur un serveur sans accès SSH

Il y a une prise en charge basique du 'cd __' qui fonctionne tant qu'on utilise des commandes simples

```shell
# Commandes qui fonctionnent
ls
cd toto

# Commandes qui ne fonctionnent pas
ls; cd toto
cd toto; ls ..
```
