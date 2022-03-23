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
6. Vérifier avec `git remote`

Vous pouvez maintenant travailler sur gitlab normalement (commit, push, etc..) et une fois vos changements terminés
lancez `git push heroku master` pour déployer sur la branche master de heroku.

## BUGS PRESENTS DANS L'APPLICATION


1. La date de fin des inscriptions
est définie dans le code et ne peut pas être consultée 
ou modifiée par l'administrateur.
La création d'un rôle directeur (directeur@gmail.com) sera utile.

Tous les utilisateurs peuvent consulter la date.
Seul le directeur peut modifier la date

//Pas réalisé car avancement du dossier a nécessité plus de travail que prévu  :
Changement des vues, changement de la logique métier + base de données.

2. Incident 4 - CESS - 404
En tant que secrétaire, si je consulte l'étudiant de matricule 1,
si je clique sur le bouton CESS, une erreur 404 est affichée.
// erreur a comprendre

3. Incident 1 - Formulaire PAE

Malgré les story ci-dessous terminées, un incident subsiste :

Étudiant consulter mon PAE modifer/vérifier
Étudiant connaître l'avancement de mon dossier connaître

En tant qu'étudiant, le bouton Post du formulaire d'encodage des programmes 
ne provoque aucune action visible (en tant qu'étudiant ou secrétaire).

//Pas réellement un bug, la fonctionnalité n'a juste pas été implémentée

## USER STORIES REALISEES

créer un compte dans le but de  faire ma demande d'inscription
CONSULTER PAE
connaitre l'avancement de mon dossier
gérer les pré-requis
introduire une demande à la CAVP
consulter la liste des étudiants(des futurs étudiants inscrits)
mettre à jour le dossier d'un étudiant
définir la période d'inscription
traiter les demandes de la CAVP

## USER STORIES NON REALISEES ESTIMEES

PAYER LE MINERVAL SPIKES
modifier mon PAE (nouvelle proposition) 13
gérer les inscriptions des NON UE 5 

# Auteurs
- **Ayoub Lahyaoui**
- **Zakaria Bendaimi**
- **Amine-Ayoub Bigham**
- **Ismael Benkadour**
- **Said El Mouden**
- **Nicolas Rossito**
- **Kawtar Massani**
