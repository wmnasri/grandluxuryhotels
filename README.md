# Grand Luxury Hotels

## Environnement

Je vous propose une machine virtuelle Vagrant configurée avec comme base un serveur ubuntu/trusty64.
Preinstallés ("provisionnés"), vous trouverez apache2, php5, Mysql et Composer.

## Installation de VirtualBox

- Télécharger la dernière version VirtualBox [ici](https://www.virtualbox.org/wiki/Downloads).

- Installer VirtualBox sur votre machine.

## Installation de Vagrant

- Télécharger la dernière version de Vagrant [ici](https://www.vagrantup.com/downloads.html).

- Installer Vagrant sur votre machine.

## Installation de la VM

Faites un git clone du projet.

> clone https://github.com/wmnasri/grandluxuryhotels.git

- Ouvrir un terminale et mettez vous sur le projet grandluxuryhotels
 
```shell
> cd path/to/grandluxuryhotels
```

- Remontez la VM avec

```shell
> vagrant up 
```

## Configuration de la VM

j'ai configuré l'ip de la VM auprès du reseau de l'hote a 192.168.33.3 
Le nom choisi pour la vm est "grandluxuryhotels" et la RAM allouée de 1GB

Dans le "vagrantFile" :

```shell
  config.vm.network "private_network", ip: "192.168.33.3"
  config.vm.provider "virtualbox" do |vm|
    vm.name = "grandluxuryhotels"
  	vm.memory = 1024
  end
```

Les configurations sont déjà faites, vous pouvez changer cela si vous voulez.

- rajoutez le nom 'grandluxuryhotels' dans votre fichier hosts

> sous Windows, c:/Windows/system32/drivers/etc/hosts

```shell
192.168.33.3 grandluxuryhotels
```

## Configuration de la VM

**vagrant** est l'user linux utilisé pour l'install. Il est sudoer.

- Connectez-vous en SSH en utilisant comme login et password "vagrant"

## Ajout du project grandluxuryhotels

L'idée de base du travail avec les VM Vagrant est d'utiliser pour les projets 
des repertoires partagés entre le serveur et le client.

J'ai déjà monté le répertoire du projet grandluxuryhotels dans Vagrant, 
comme étant un répertoire partagé dans */vagrant*. 

Vous pouvez vérifier en passant par la console SSH de notre machine (utilisez VirtualBox ou putty et si vous travaillez sur Zend Studio vous pouvez utilisez directement l'extension "Terminal")

```shell
> ls /vagrant
```
Vous verrez le repertoire grandluxuryhotels.

### Initialisation du projet

Tous les configurations Apache2, mysql et php sont preinstallés ("provisionnés") dans le fichier provision/setup.sh

### PhpMyAdmin 

Vous pouvez accéder à la base de données via phpMyAdmin qui est provisionné sur lien suivant 

> http://192.168.33.3/phpmyadmin

Connectez-vous sur l'IHM phpMyAdmin avec root/root.
