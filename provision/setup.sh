#!/usr/bin/env bash
export DEBIAN_FRONTEND=noninteractive

# Updating and cleaning
sudo apt-get update
yes | sudo apt-get autoremove

#Install Apache
echo "Install apache..."
yes | sudo apt-get install apache2
sudo echo "ServerName localhost" >> /etc/apache2/apache2.conf
sudo a2enmod rewrite
sudo a2enmod headers

#Install php
echo "Add PHP 5.6 package sources to your system..."
sudo add-apt-repository ppa:ondrej/php5-5.6
echo 'Install php5...'
yes | sudo apt-get install php5 libapache2-mod-php5

#Install xdebug
yes | sudo apt-get install php5-xdebug

sudo echo ""                                >> /etc/php5/mods-available/xdebug.ini
sudo echo "xdebug.remote_enable = on"       >> /etc/php5/mods-available/xdebug.ini
sudo echo "xdebug.remote_autostart = off"    >> /etc/php5/mods-available/xdebug.ini
sudo echo "xdebug.remote_connect_back = on" >> /etc/php5/mods-available/xdebug.ini
sudo echo "xdebug.idekey = php-xdebug"      >> /etc/php5/mods-available/xdebug.ini

#Install debconf-utils
sudo apt-get install debconf-utils -y > /dev/null

#Install MySql
echo 'Install mysql server...'
#Set password to MySql (root)
debconf-set-selections <<< "mysql-server mysql-server/root_password password root"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password root"
sudo apt-get install mysql-server -y > /dev/null

#Install phpMyAdmin
echo "install phpMyAdmin..."
yes | sudo apt-get install phpmyadmin

# Install virtualhosts and restart apache
sudo cp /tmp/grandluxuryhotels.conf  /etc/apache2/sites-available/grandluxuryhotels.conf

sudo echo "Include /etc/phpmyadmin/apache.conf" >> /etc/apache2/apache2.conf
sudo a2ensite  grandluxuryhotels.conf

echo "Restart apache..."
sudo service apache2 restart

# Add new hostnames to hosts file
sudo echo  "127.0.0.1 grandluxuryhotels" > /etc/hosts

#Install Git 
echo 'Installing Git...'
yes | sudo apt-get install git

#Add composer 
echo 'Install Composer ...'
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

echo "VM provisioned."
