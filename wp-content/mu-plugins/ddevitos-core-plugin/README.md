# The Better Software Company
## TBSC Core Plugin

This core plugin is responsible for all core / helper functions like parsing config files and rendering views.

All other plugins will use these classes and assume their existence, so this plugin must be active at all times.

Best practice would be to put this plugin in the wp-content/mu-plugins/ folder.