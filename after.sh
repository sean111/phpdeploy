#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
curl -L http://deployer.org/deployer.phar -o deployer.phar
mv deployer.phar /usr/local/bin/dep
chmod +x /usr/local/bin/dep
