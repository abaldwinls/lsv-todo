## About
This is a basic demonstration of creating a Laravel project, running migrations and seeders, and displaying information using
controllers, blade templates, and sass. This project assumes the developer already has a preferred dev environment set up.

## Install

1. Clone project
2. Create a database. Default db name here is 'lsvtodo'. Be sure to fill in (or change) the env values with respect to your own DB.
3. Run 'php artisan migrate'
4. Run 'php artisan db:seed'
5. Access using the respective dev environment processes that you downloaded this into (ex. WAMP, Dev server, Docker etc). Be sure your 'APP_URL' value accounts for this as well.

## Notes
-> Project names and usernames are hardcoded, but which tasks get assigned to which person is dynamically generated,
as well as the hours for said task.

-> This is a very basic demonstration of DB interaction. There is no authentication implementations, complex routing, or validation of anything. The env file is included as well but realistically this would not be included in a repository for a real project.