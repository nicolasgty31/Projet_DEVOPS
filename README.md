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
