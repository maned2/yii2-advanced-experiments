# Localhost
## Installation
    composer install
    php init

    sudo cp nginx-local.conf /etc/nginx/sites-available/yii2-adv.local.conf
    sudo nano /etc/nginx/sites-available/yii2-adv.local.conf
    sudo ln -s /etc/nginx/sites-available/yii2-adv.local.conf /etc/nginx/sites-enabled/yii2-adv.local.conf
    sudo service nginx restart

    sudo -u postgres psql
    create database yii2advdb;
    create user yii2advuser with encrypted password '123';
    grant all privileges on database yii2advdb to yii2advuser;

    nano common/config/main-local.php
    php yii migrate

# API
## Documentation
    vendor/zircote/swagger-php/bin/openapi -o api/web/documentation/swagger.json ./ --exclude vendor

# Vagrant

## Installation

install vagrant https://www.vagrantup.com/downloads.html
from .deb file

    cd vagrant/config
    cp vagrant-local.example.yml vagrant-local.yml
    nano vagrant-local.yml
    cd ../../
    vagrant plugin install vagrant-hostmanager

## Run
    vagrant up
    vagrant halt
    vagrant destroy
    vagrant ssh

## Usage
    vagrant list-commands

# TODO
- [ ] move to docker
- [ ] accesstoken lifetime and other db table
- [ ] refreshToken
