<p align="center">Projet PHP: Gestion de recette avec Laravel</p>

## Guide d'installation

### 1er étape: Pré-requis

- Installer Laravel. Un guide d'installation se trouve [ici](https://laravel.com/docs/8.x/installation).
- Faire un git clone de ce projet

### 2eme étape: Installation des dépendances et packages nécessaires.
- Installation des dépendances composer avec la commande : `composer install`
- Installation des dépendances npm avec la commande : `npm install`
- 
#### Package utilisé :
- Installer le package [https://github.com/laravel/ui](laravel/ui) avec la commande `composer require laravel/ui --dev`
- Installer le package [https://laravelcollective.com/docs](laravelcollective/html) avec la commande `composer require laravelcollective/html` 
- Après l'installation du package précédent, executer cette commande: `php artisan ui bootstrap --auth`

### 3eme étape: Configuration de l'environnement
Dans *config/app.php* rajouter ces élèments: 

`'providers' => [
....
'Collective\Html\HtmlServiceProvider',
],
'aliases' => [
....
'Form' => 'Collective\Html\FormFacade',
],`
Cela va permettre l'utilisation de *Form* dans nos vues(.blade).

Puis vérifier que dans le fichier *.env* nous avons bien ces informations : 

`DB_CONNECTION=sqlite`\
`DB_DATABASE=../database/database.db`

Cela va permettre l'utilisation de la base de donnée *database.db*

### 4eme étape: Mise en place de la base de donnée

La base de donnée est en principe déjà configuré et prête à être utilisé cependant vous pouvez à tout moment la réinitialiser et la re-populé avec les commandes suivantes: 

`php artisan migrate:fresh` \
`php artisan db:seed` \

N.B: La population de la base de donnée va permettre la génération d'une vrai recette et d'un compte admin avant le remplissage de celle-ci via de fausse information.


### 5eme étape: Lancement du serveur et identifiant

Une fois toute les étapes précédentes éffectuer vous pouvez à présent lancer le serveur local avec la commande : `php artisan serve` <br/>
Il ne vous restera plus qu'a aller sur http://127.0.0.1:8000/ pour visiter le site web. 

Pour vous connectez en tant qu'administrateur il vous suffit de rentré ces identifiants : 

email : admin@admin.com <br/>
password: adminadmin


## Fonctionnalités du site

Le site propose différentes fonctionnalités en fonction de l'utilisateur et de si celui-ci est connecté ou non :

- Consulter des recettes : <br/>
A l'ouverture du site vous arrivez sur l'accueil de celui-ci dans cette endroit vous aurez la possibilité de consulter les 3 premieres recettes dans la liste des recettes en cliquant sur celle-ci. 
<p align="center"><img src="https://i.postimg.cc/66RWVxmc/home.png" width="600" title="home"></p>

Vous pouvez aussi sur le header du siteweb cliqué sur "Recettes" afin d'accéder à la liste compléte des recettes que vous pourrez par la suite consulter.
<p align="center"><img src="https://i.postimg.cc/qv6jqQRN/recette.png" width="600" title="recette"></p>

- Saisir un formulaire de contact : <br/>
Il est possible de saisir un formulaire de contact dans l'onglet "Contact" du header et d'avoir un feedback de l'envoie de celui-ci juste après son envoie.
<p align="center"><img src="https://i.postimg.cc/44h6znG0/contact.png" width="600" title="contact"></p>

- l'Inscription : <br/>
Il est possible pour un utilisateur de s'inscrire pour avoir un comtpe utilisateur sur le site en cliquant sur "Register".
<p align="center"><img src="https://i.postimg.cc/85vbPCPx/register.png" width="600" title="register"></p>

- l'Authentification : <br/>
Il est également possible si l'utilisateur posséde déjà un compte utilisateur de se connecter directement au site en cliquant sur "Login".
<p align="center"><img src="https://i.postimg.cc/fT1TYTw8/login.png" width="600" title="login"></p>

- Ajout de recette avec fichier média : <br/>
Après s'être identifier l'utilisateur aura à présent la possiblité d'ajouter des recettes en cliquant sur le bouton "ajouter une recette".
<p align="center"><img src="https://i.postimg.cc/x8t5B4dd/add-Recette.png" width="600" title="addRecette"></p>

Ce bouton améne l'utilisateur vers le formulaire d'ajout d'une recette dans lequel il pourra saisir les différentes informations de la recette et ajouté une image pour celle-ci, il aura également la possibilité d'avoir une "preview" de l'image avant l'ajout de celle-ci.
<p align="center"><img src="https://i.postimg.cc/3rVPBtqZ/add-Recette-Form.png" width="600" title="addRecetteForm"></p>

- Modifier et Supprimer : <br/>
Après l'ajout d'une recette l'utilisateur propriétaire (le créateur de la recette) aura la possibilité si il le souhaite de modifier ou de supprimer celle-ci en consultant la liste des recettes dans l'onglet "Recette". 
<p align="center"><img src="https://i.postimg.cc/QMC2mvj0/proprio-Recette.png" width="600" title="RecetteCreator"></p> <br/>

En cliquant sur l'icone de modification l'utilisateur va accéder au formulaire de modification, formulaire dans lequel les informations de la recette seront déjà pré-rempli. L'utilisateur n'aura plus qu'a y mettre ces modifications.
<p align="center"><img src="https://i.postimg.cc/Gtn3Zb2c/editForm.png" width="600" title="RecetteCreator"></p> <br/>

L'utilisateur aura aussi la possibiltié de supprimer sa recette en cliquant sur l'icone de suppression, résultant à la suppresion de sa recette de la base de donnée.
<p align="center"><img src="https://i.postimg.cc/PqZ5KLX6/delete.png" width="600" title="RecetteDelete"></p> <br/>

- Ecrire des commentaires : <br/>
Après s'être connecter l'utilisateur va débloquer un nouvel aspect lors de la consultation d'une recette qui est la possibilité d'écrire des commentaires. (Soumission du formulaire en Ajax)
<p align="center"><img src="https://i.postimg.cc/zDRSY7dv/recette-Consultation-Logged-In.png" width="600" title="RecetteCommentEmpty"></p>
<p align="center"><img src="https://i.postimg.cc/44LCjJSs/comment-On-Recette.png" width="600" title="CommentOnRecette"></p> <br/>


- Gestion des recettes par l'Administrateur : <br/>
Le site sépare les utilisateurs en 2 catégories ou rôles différents, les utilisateurs classique et les administrateurs.
Actuellement le site ne dispose que d'un administrateur par défaut. <br />
Pour rappel les identifiants de l'administrateur sont: admin@admin.com avec pour mot de passe: adminadmin <br/>
**En tant qu'administrateur celui-ci a accés à toutes les fonctionnalités présenter précédement et cela pour toutes les recettes. 
Cette à dire consulter, modifier, supprimer, écrire des commentaires sur n'importe quelle recette et même ajouter des recettes.**
<p align="center"><img src="https://i.postimg.cc/VsKy2jNJ/Admin-View.png" width="600" title="AdminView"></p> <br/>

- Autres fonctionnalités : <br/>
Une vérification des formulaires est effectuer avant la validation de chaque formulaire afin d'éviter tout bug.




