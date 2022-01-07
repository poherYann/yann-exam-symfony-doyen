"# yann-exam-symfony-doyen" 

Bienvenue Florian sur le dépot git de Yann pour son examen symfony.

Pour déployer le projet : 
 - le dépot git : https://github.com/poherYann/yann-exam-symfony-doyen
 - le lien du git : https://github.com/poherYann/yann-exam-symfony-doyen.git
 - dans le dossier où tu veux récup le code : clic droit > git bash here
 - git clone https://github.com/poherYann/yann-exam-symfony-doyen.git
 - dans cd nom_du_projet -> composer install
 
Dans le fichier env :
DATABASE_URL="mysql://root:@127.0.0.1:3306/netfleet?serverVersion=5.7"

php bin/console d:d:c pour créer la db

Les commandes pour faire les migrations de l'entity Videos.php :
php bin/console make:migration
php bin/console doctrine:migrations:migrate

Pour lancer le projet :
symfony server:start

Dans le controller NetfleetController tu as la liste des routes :
Accueil = /
Pour ajouter un objet en db c'est : /create/
Pour afficher tous les objets : /getall/
Pour afficher qu'un film : /get/id


 

