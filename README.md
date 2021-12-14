# PAE - Equipe 1

[Lien vers notre site web](https://equipe1-pae.herokuapp.com/ "Equipe1-PAE")

## Comptes

- Compte d'un étudiant : `54247@gmail.com`, MDP : `dewdew`
- Compte d'un secretaire : `secretaire@gmail.com`, MDP : `esipov`
- Compte d'un admin (pas de fonctionnalités admin implémentée) : `admin@gmail.com`, MDP : `admin`

N'hésitez pas à créer un nouveau compte pour avoir une expérience de nouvel utilisateur !

## Travailler sur Gitlab et Heroku

1. Installer Heroku CLI :`https://devcenter.heroku.com/articles/heroku-cli`
2. Se connecter via la commande `heroku login`
3. Cloner le projet depuis gitlab sur votre pc
4. Se placer dans le dossier du projet
5. Ajouter la remote heroku via le terminal gitlab : `heroku git:remote -a equipe1-pae`

Vous pouvez maintenant travailler sur gitlab normalement (commit, push, etc..) et une fois vos changements terminés
lancez `git push heroku master` pour déployer sur la branche master de heroku.
