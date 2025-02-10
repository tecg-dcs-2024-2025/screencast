# Screencast - Développement côté serveur - 2024-2025

Le support de ce projet du bloc deux de l’orientation Web du [bachelier en techniques infographiques de la HEPL](https://hepl.be/fr/techniques-infographiques) est une application qui permet au propriétaire d’un animal de déclarer la perte de son compagnon. Le projet est basé sur [un exercice réalisé dans le cours de création de pages Web](https://github.com/tecg-cpw/html-form-perte-animal) en bloc un. 

Le premier objectif est de réaliser la soumission du formulaire et le traitement des données, en commençant par la validation, qui est un enjeu crucial dans le développement côté serveur puisqu'on n'a jamais la moindre garantie que les requêtes correspondent aux attentes des programmes qui doivent les traiter, ce qui expose tout le système qui se trouve derrière (bases de données, services) à des risques considérables.

Dans un premier temps, il suffira d'afficher un récapitulatif des données soumises. Ensuite, il faudra enregistrer ces données dans une base de données. Enfin, une application de gestion avec accès sécurisé par une procédure d'identification sera développée pour permettre au gestionnaire de l'application de réaliser diverses actions (typiques d'un CRUD) sur les déclarations soumises par les propriétaires d'animaux.

L’examen utilisera le code développé au cours et sera l'occasion d'ajouter ou de modifier certaines fonctionnalités.

Le projet est développé à l’aide du langage PHP, mais l’essentiel portera sur des questions d’architecture, de bonnes pratiques, et pour nous guider, nous prendrons de l’inspiration dans la documentation du framework Laravel, utilisé dans les cours de 3e année.