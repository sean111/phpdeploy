# PHPDeploy

A web based gui for the dev tool from deployer.org

## Setup
* Add a user onto your target servers and make sure the user has access to any repositories via ssh keys
* Create a new project
* Create a new server and add the keys to the target users authorized_keys file
* Create environments for the server
* Get the deploy token from your projects overview within the environment panel
* Setup a POST hook to hit /deploy/{token}


## ToDo
* Tie group permissions to manual deployments
* Allow some environments to not be deployed by the token
* Make sure a deploy only triggers for the target branch
* Overhaul the UI
* Searching
