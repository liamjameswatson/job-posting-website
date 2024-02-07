# Laragigs

An app for posting software jobs

## Description

This is a laravel app, that connects to a MySQL database

## Usage

To use this app install it, and follow the links to sign up. Once registered an employer can post their jobs, and company information. They can magange their jobs in the maganage jobs page.

## Installation

Download the file from this repository, and run the following the command:
`php artisan serve`

## Migrations

To create all the nessesary tables and columns, run the following command:
`php artisan migrate`

## Seeding the data

To add the dummy listings with a single user, run the following

`php artisan db:seed`

## Upload a file

When uploading a company image, go to "storage/app/public". Create a symlink with the following command to make them publicly accessible.

`php artisan storage:link`

## Screenshot

![Screenshot](./public\screenshot\screenshot.png)

## Credits

Built by following this course https://www.youtube.com/watch?v=MYyJ4PuL4pY, as my first php/laravel project.

## License

MIT License (Please refer to [LICENSE](/LICENSE) in the repo.)
