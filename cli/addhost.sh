#!/bin/bash
#SELECT user,host FROM mysql.user;
if [ $# -gt 0 ]; then
    domini=$1
    nomdb=$(echo $domini | tr '.' '_')
    passdb=$2

    mkdir /var/www/vhost/$domini
    mkdir /var/www/vhost/$domini/www
    mkdir /var/www/vhost/$domini/logs
    mkdir /var/www/vhost/$domini/certs

    chmod -R 755 /var/www/vhost/$domini
    chown -R debian:www-data /var/www/vhost/$domini

    openssl req -new -x509 -days 365 -nodes -out /var/www/vhost/$domini/certs/cert-$domini.pem -keyout /var/www/vhost/$domini/certs/cert-$domini.key

    cat template.txt | awk -v nom=$domini '{gsub(/\(nom\)/,nom)}1' | awk -v cert=cert-$domini '{gsub(/\(cert\)/,cert)}1' > /etc/apache2/sites-available/$domini.conf

    a2ensite $domini.conf

    systemctl restart apache2

    echo "CREATE DATABASE $nomdb;" | mariadb -u root -p
    echo "CREATE USER '$nomdb'@'%' IDENTIFIED BY '$passdb';" | mariadb -u root -p
    echo "GRANT ALL ON $nomdb.* TO '$nomdb'@'%' IDENTIFIED BY '$passdb';" | mariadb -u root -p
    echo "FLUSH PRIVILEGES;" | mariadb -u root -p

    echo "Domini: $domini"
    echo "Web: https://www.$domini"
    echo "Nom de la Base de dades: $nomdb"
    echo "usuari de la base de dades $nomdb amb contrasenya $passdb"
else
    echo "Error: Falten Parametres!!!";
    echo "Exemple: ./addHost.sh domini.com paraula-clau"
fi