Vagrant.configure("2") do |config|
  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"
  config.vm.network :forwarded_port, guest: 80, host: 2200
  config.vm.provision :shell, :path => "provisioning/bootstrap.sh"
  config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=775","fmode=775"]
end
