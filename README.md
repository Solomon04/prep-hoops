# Intro
This TODO app is simple yet powerful. 
This application allows you to: 
- Organize tasks day by day
- Organize tasks into categories
- Check your daily stats

### Application Demonstration
_Here is a demonstration of my TODO app_

[![TOOO App Demo](https://img.youtube.com/vi/_HyoieS3rs4/0.jpg)](https://www.youtube.com/watch?v=_HyoieS3rs4) 

### Getting Started
_Download the repo directly or using git_

#### Requirements:
- PHP (https://www.apachefriends.org/index.html)
- MySQL (https://www.apachefriends.org/index.html)
- Composer (https://getcomposer.org/)
- NPM (https://www.npmjs.com/)

#### Step One
After installing/downloading the repo cd into the directory and run:
`cp .env.example .env`

#### Step Two
Then change the following to fit your needs:
```
DB_HOST=YOUR_DB_HOST
DB_PORT=3306
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_DB_USER
DB_PASSWORD=YOUR_DB_PASSWORD
```

#### Step Three
Next, to install the php dependencies you have will have to run `composer install` _this may take a while_

#### Step Four
We will then install the javascript/frontend dependencies using `npm install` 

#### Step Five
To populate the database run `php artisan migrate` this will add all the necessary tables 

#### Step Six
Finally, run `php artisan serve` where you then access the project here: http://127.0.0.1:8000

### Contributors
This application was created by Solomon Antoine. If you want to contact him please reach out to him here: antoinesolomon5@gmail.com 

_Note this application was built for the Prep Hoops Challenge, however I actually plan on launching this to the public after realizing its potential. Will be out by **June 2019**_