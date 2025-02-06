# VAII-Project2024
Tento projekt predstavuje moju semestrálnu prácu z predmetu VAII (vývoj aplikácií pre internet a intranet). Predstavuje webovú aplikáciu leteckej spoločnosti, ktorá ponúka možnosť zakúpenia si leteniek na rôzne lety.
Projekt je postavený na Frameworku [Vaiiko](https://github.com/thevajko/vaiicko).

## Návod na lokálne spustenie
Na použitie webovej aplikácie je potrebené mať Docker [Docker Desktop](https://www.docker.com) a vývojové prostredie pre jazyk PHP [PhpStorm](https://www.jetbrains.com/phpstorm/).

## 1. Stiahnutie repozitára
```git clone github.com/rivolt124/VAII-Project2024.git```.

## 2. Spustenie 
1. Spustenie Dockeru.
2. Otvorenie a spustenie súboru ```docker-compose.yml```.
3. Po úspešnom spustení by sa mali v Dockery v sekcii Containers objaviť položka [vymazal_project]:
    - adminer-1 - spravovanie databázy
    - db-1 - databáza
    - web-1 - stránka

## Problém s databázou
Ak by nastali dáke problémy, v priečinku ```/docker/sql``` sa nachádzajú tabuľky spolu s dátamy.
