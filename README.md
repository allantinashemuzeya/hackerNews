


# Welcome To <_Hacker News/_>
``
## Testing Environment Running Ubuntu 18 
docker.coinsoft.co.za:5555/

## SSH Access to server 
ssh root@docker.coinsoft.co.za -p 6666
password: Kunfucool24 

## Mysql Database Access 
docker.coinsoft.co.za:5555/phpmyadmin 
Username: Admin
password: Kungfucool24 

## About Hacker News
Hacker News Clone is a web application that periodically fetches the latest news items using the hacker
news API. The application does the following: 

- Fetch the news items periodically for top stories, new stories and best stories.
- Keeps a storage of  the news item a SQL database.
- Fetches all the comments associated with the news item and stores them in the
  database.
- Has views that display the content as per the hacker news site with the associated detail page
  that includes the item's comments.
- Has an MVC/ similar architecture
- Written in Laravel 8.


## Project Setup

Follow the below steps to set up the project:
- Clone the repository into your server
- Run Composer install


## Important Information to note

A cron job is running in the development server deployed on docker which is triggering the functions that are collecting data from the API. This
