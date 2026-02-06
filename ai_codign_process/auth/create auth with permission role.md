first take auth related file from the laravel folder 


#### Step 1:
then give User.php Role.php Profile.php Permission.php to the ai-agent to first create the model-migrations based on this tables,


#### Step 2:
then in next fresh prompt add the step 1 completed model-migrations with the AuthController.php (also example of the current route-controller-secvices) to create controller like AuthController.php in current project but only login register ('login' 'register' 'logout' 'get user data' part) part without email sending forget-reset-password .


#### Step 3:
make seeder: first Make permissions seeders, make a entityNames varaiable where all entity will be , make another variables where the permissions for every entity will be created , permission names are "readany" "read" "create" "update" "delete" "manage-options" "create-options" , make "admin" "editor" "user" role ,where "admin" will have all permissions, "editor" will have read update permissions, "user" will only have read permissions, create "admin" "editor" "user" data in user table too
