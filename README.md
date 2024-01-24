# Projet truc

## Démarrer le projet en local

```bash
docker-compose up-d
```

## Charger la base de donnees

```bash
cat scriptBDsaecakeyMySQL.sql|docker exec -i saes301_cakey_database-etudiants.iut.univ-paris8.fr_1 mysql -uroot -proot_password dutinfopw201628
cat insertionsScriptCakeyBDMySQL.sql |docker exec -i saes301_cakey_database-etudiants.iut.univ-paris8.fr_1 mysql -uroot -proot_password dutinfopw201628
```

## Se connecter à la base

```bash
docker exec -ti saes301_cakey_database-etudiants.iut.univ-paris8.fr_1 mysql -uroot -proot_password
```

## 