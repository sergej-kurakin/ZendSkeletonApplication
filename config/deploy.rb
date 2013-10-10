set :stages, %w(production staging testing)
set :default_stage, "staging"
require 'capistrano/ext/multistage'

set :application, "zfskeleton"
set :repository,  "./build/"

set :scm, :none

set :copy_exclude, %w[.git .DS_Store .gitignore .gitmodules .sass-cache Capfile config.rb config/*.rb config/autoload ]

set(:deploy_to) { "/home/#{user}" }
set :deploy_via, :copy

set :current_dir, "www"

set :shared_children,   %w(config/autoload data/log www/uploads)
set :writable_children, %w(data/log www/uploads)
set(:copy_remote_dir) { "/home/#{user}/tmp" }
set :copy_compression, :bzip2

set :use_sudo, false

set :keep_releases, 4

namespace :deploy do
  task :restart do
    # no-op
  end

  task :migrate do
    # no-op
  end

  desc "Setup permissions on writable dirs"
  task :setup_writable do
    dirs = writable_children.map { |d| File.join(shared_path, d.split('/').last) }
    run "#{try_sudo} chmod a+w #{dirs.join(' ')}"
  end

  desc "Setup tmp dir on in case we are shared"
  task :setup_tmp do
    dirs = [copy_remote_dir]
    run "#{try_sudo} mkdir -p #{dirs.join(' ')}"
    run "#{try_sudo} chmod g+w #{dirs.join(' ')}" if fetch(:group_writable, true)
  end
end

desc "Output uname of the server"
task :uname do
  run "uname -a"
end

after 'deploy:setup', 'deploy:setup_writable'
after 'deploy:setup', 'deploy:setup_tmp'
after 'deploy', 'deploy:cleanup'
