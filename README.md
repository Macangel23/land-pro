`composer install` \n
`npm install`

#Run the migration to populate tables of database \n
php artisan migrate

#Seed the data \n
php artisan db:seed


#Docker setup
1. Create land-property-docker or any folder name but it should have the ff folders and files like this.
- docker folder
   - nginx folder
   - mysql folder
   - Dockerfile
2. Create new docker folder inside land-property-docker
3. Inside docker folder create new folder nginx and mysql also Dockerfile without extensions (or user touch Dockerfile command)