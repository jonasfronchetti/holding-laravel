Atualizar php 7.1.3 e laravel 5.6

sudo add-apt-repository ppa:ondrej/php
sudo apt-get update

service apache2 stop
sudo apt-get install php7.1 php7.1-common

sudo apt-get install php7.1-curl php7.1-xml php7.1-zip php7.1-gd php7.1-mysql php7.1-mbstring
php -v

sudo apt-get purge php7.0 php7.0-common
sudo shutdown -r now
sudo a2enmod php7.1
service apache2 restart
sudo apt-get -y install php7.1-pgsql
 
 
composer update
