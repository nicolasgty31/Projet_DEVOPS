# Projet_DEVOPS
Projet Final DEVOPS Kubernetes

1) Intaller Kubernetes sur Linux

-Ouvrir un terminal
curl -LO "https://dl.k8s.io/release/$(curl -L -s https://dl.k8s.io/release/stable.txt)/bin/linux/amd64/kubectl"

-Pour l'installer
sudo install -o root -g root -m 0755 kubectl /usr/local/bin/kubectl

-Mettez à jour l'index des packages apt et installez les packages nécessaires pour utiliser le référentiel apt Kubernetes :
sudo apt-get update
sudo apt-get install -y apt-transport-https ca-certificates curl

-Téléchargez la clé de signature publique Google Cloud :
sudo curl -fsSLo /usr/share/keyrings/kubernetes-archive-keyring.gpg https://packages.cloud.google.com/apt/doc/apt-key.gpg

-Ajoutez le dépôt Kubernetes apt :
echo "deb [signed-by=/usr/share/keyrings/kubernetes-archive-keyring.gpg] https://apt.kubernetes.io/ kubernetes-xenial main" | sudo tee /etc/apt/sources.list.d/kubernetes.list

-Mettez à jour l'index du package apt avec le nouveau référentiel et installez kubectl :
sudo apt-get update
sudo apt-get install -y kubectl


2) Installer Minikube

-Ouvrir un terminal
curl -Lo minikube https://storage.googleapis.com/minikube/releases/latest/minikube-linux-amd64 \
&& chmod +x minikube
sudo mkdir -p /usr/local/bin/
sudo install minikube /usr/local/bin/

-Pour confirmer la réussite de l'installation
minikube start --driver=<driver_name>

- Vérifier l'état du cluster
minikube status

3) Déploiment Lamp

-Permet de voir les services et les pods normalement vous avez qu'une ligne
kubectl get all

-On va créer un ficher secret pour mettre le script de déploiment
kubectl geet secrets
kubectl create secret generic database --from-literal=MYSQL_ROOT_PASSWORD=nbtech --from-literal=MYSQL_DATABASE=kodekloud --from-literal=MYSQL_USER=nbtechsupport --from-literal=MYSQL_PASSWORD=nbtech --from-literal=MYSQL_HOST=mysql-service

-Refaite cette commande et vous allez voir qu'il y a une nouvelle ligne
kubectl get all

-On va éditer le fichier lamp pour mettre le script de déploiment qui se trouve sur le git qui se nomme "Deploy Lamp Stack"
vi /tmp/lamp.yaml

-On va excuter le le fichier déploiment
kubectl creat -f /tmp/lamp.yaml

-Vous pouvez vérifier si l'installation a été bien faite avec cette commande
kubectl get all

-Maintenant on va éditer le fichier index.php (il se trouve dans le git)
sudo vi index.php

-Vous pouvez vérifier si l'installation a été bien faite avec cette commande
kubectl get all

-On va push dans le conteneur l'index.php
-Cette commande permet d'afficher le nom 
kubectl get pods
kubectl cp (le nom du conteneur):/app -c httpd-php-container

4) Base de données

-Utilisez le fichier secret qui se trouve dans sur le git et ouvrez le.
nano mysql-secret.yaml

-Le mot de passe du fichier "mysql-secret.yaml" est: password

-Enregistrez le fichier et quittez. Utilisez kubectl.
kubectl apply -f mysql-secret.yaml

-Utilisez le fichier de déploiement qui se trouve dans sur le git et ouvrez le. Le fichier de déploiement définit les ressources que le déploiement MySQL utilisera.
nano mysql-deployment.yaml

-Enregistrez le fichier et quittez. Créez le déploiement en appliquant le fichier avec kubectl.
kubectl apply -f mysql-deployment.yaml

-Pour accéder à l'instance MySQL, accédez au pod créé par le déploiement.
kubectl get pod

-Ouvrez un shell pour le pod en exécutant la commande suivante :
kubectl exec --stdin --tty mysql-694d95668d-w7lv5 -- /bin/bash

-Tapez la commande suivante pour accéder au shell MySQL.
mysql -p

-Lorsque vous y êtes invité, entrez le mot de passe que vous avez défini dans le secret Kubernetes qui est: password
