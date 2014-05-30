#!/bin/sh

# Edit the following to change the name and password of the database user that will be created:
APP_DB_USER=vagrant
APP_DB_PASSWORD=vagrant

# Edit the following to change the name of the database that is created
APP_DB_NAME=sample

###########################################################
# Changes below this line are probably not necessary
###########################################################
print_db_usage () {
  echo "Your MySQL database has been setup"
  echo "  Database: $APP_DB_NAME"
  echo "  Username: $APP_DB_USER"
  echo "  Password: $APP_DB_PASSWORD"
}

# installation
echo "mysql-server-5.5 mysql-server/root_password password vagrant" | debconf-set-selections
echo "mysql-server-5.5 mysql-server/root_password_again password vagrant" | debconf-set-selections
sudo apt-get update
sudo apt-get -y install mysql-server-5.5 php5-mysql apache2 php5 vim

# Setup MySQL
if [ ! -f /var/log/databasesetup ];
then
    echo "CREATE USER '$APP_DB_USER'@'localhost' IDENTIFIED BY '$APP_DB_PASSWORD'" | mysql -uroot -pvagrant
    echo "CREATE DATABASE $APP_DB_NAME DEFAULT CHARACTER SET utf8" | mysql -uroot -pvagrant
    echo "GRANT ALL ON $APP_DB_NAME.* TO '$APP_DB_USER'@'localhost'" | mysql -uroot -pvagrant
    echo "flush privileges" | mysql -uroot -pvagrant

        # fix deprecated unique option prefix key_buffer and and myisam-recover
    sed -i 's/key_buffer/key_buffer_size/' /etc/mysql/my.cnf
    sed -i 's/myisam-recover/myisam-recover-options/' /etc/mysql/my.cnf

    # set default charset to utf8
    cp /vagrant/provisioning/database/my.cnf /home/vagrant/.my.cnf

    service mysql restart

    touch /var/log/databasesetup

    mysql -uvagrant -p"$APP_DB_PASSWORD" --default-character-set=utf8 "$APP_DB_NAME" < /vagrant/provisioning/database/schema.sql
    mysql -uvagrant -p"$APP_DB_PASSWORD" --default-character-set=utf8 "$APP_DB_NAME" < /vagrant/provisioning/database/sampledata.sql

fi

# Setup Apache
if [ ! -h /var/www ]; 
then 

    rm -rf /var/www 
    sudo ln -s /vagrant/ci/public /var/www

    a2enmod rewrite

    sed -i '/AllowOverride None/c AllowOverride All' /etc/apache2/sites-available/default

    # User configurations
    sudo cp /vagrant/provisioning/apache/httpd.conf /etc/apache2/httpd.conf

    # Append ServerName
    sudo echo "ServerName localhost" >> /etc/apache2/conf.d/fqdn

    service apache2 restart
fi

# Show configuration messages
print_db_usage
