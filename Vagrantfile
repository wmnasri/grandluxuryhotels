# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.provider "virtualbox" do |vm|
    vm.name = "grandluxuryhotels"
  	vm.memory = 1024
  end
  config.vm.network "forwarded_port", guest: 80, host: 8000
  config.vm.network "private_network", ip: "192.168.33.3"
  # config.vm.network "public_network"
  config.ssh.forward_agent = true
  
  config.vm.provision "file", source: "grandluxuryhotels.conf", destination: "/tmp/grandluxuryhotels.conf"
  config.vm.provision "shell", path: "./provision/setup.sh"
end
