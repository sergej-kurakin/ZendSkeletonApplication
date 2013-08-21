set :user, "testing"

server "192.168.56.101", :app, :primary => true

set :deploy_to, "/home/#{user}/sites/#{application}"