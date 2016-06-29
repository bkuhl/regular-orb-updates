# Regular Orb Updates

Submit regular updates to the orbs.  If multiple tasks are defined, the system will randomly pick one and submit that.

Use cases:
 * If you work in sprints, update the container with the tasks in the current sprint and deploy the container and each morning 1 will be submitted
 * If you jump between regular or the same tasks all day (i.e. - support tickets), that task will be sent on your behalf to the orbs

**Usage**

 * Fork this repo
 * [Customize the configuration](https://github.com/realpage/regular-orb-updates/blob/master/config/updates.php) to meet your needs
 * Build a docker container and deploy it
 
 > For further automation, setup your repo to [automatically build](https://docs.docker.com/docker-hub/builds/) on Dockerhub