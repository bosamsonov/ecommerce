Generate the Vagrantfile and Homestead.yaml

Mac / Linux:
php vendor/bin/homestead make


Windows:

vendor\\bin\\homestead make

Edit vendor/laravel/homestead/scripts/homestead.rb by adding host_ip:'localhost' on lines 90 and 98