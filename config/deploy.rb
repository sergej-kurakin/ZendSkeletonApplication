set :stages, %w(production staging testing)
set :default_stage, "staging"
require 'capistrano/ext/multistage'

set :user, "zaza"

set :application, "zfskeleton"
set :repository,  "./build/"

set :scm, :none

set :copy_exclude, %w[.git .DS_Store .gitignore .gitmodules .sass-cache Capfile config.rb config/*.rb config/autoload ]

set :deploy_to, "/home/#{user}/sites/#{application}"
set :deploy_via, :copy

set :shared_children,   %w(config/autoload data/log)

role :app, "192.168.56.101"

server "192.168.56.101", :app, :primary => true

set :use_sudo, false

set :keep_releases, 4

namespace :deploy do
  task :restart do
    # no-op
  end

  task :migrate do
    # bo-op
  end
end

desc "Output uname of the server"
task :uname do
  run "uname -a"
end
