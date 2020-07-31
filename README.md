# Installation guide

#### clone project 
`git clone git@github.com:david-aramyan/NewsLaraVue.git`

**Go to project directory and run commands**
#### Install composer dependencies
`composer install`
## Install npm dependencies
`npm install`

#### Copy .env.example file to .env file.
`$ cp .env.example .env`

#### Generate app-key with command
`php artisan key:generate`

#### Create a database for application.
<p>In your mysql console run the command.</p>

`CREATE DATABASE <database name> CHARACTER SET utf8mb4 COLLATE utf8_unicode_ci;`

#### App Configurations 
<p>Add your database credentials to .env file.</p>

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=<database name>
    DB_USERNAME=root
    DB_PASSWORD=
```

<p>Add your email configurations to .env file.</p>
<p>By default it's set to <strong>mailtrap</strong> you can add your mailtrap account credentials for testing purposes .</p>

```
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=news@mail.loc
    MAIL_FROM_NAME="${APP_NAME}"
```

#### Create a database with data with command
`php artisan migrate --seed`
<p>This will create all needed database tables & will create admin user.</p>

#### Run build in server by command
`php artisan serve`
<p>And open <code>http://localhost:3000</code> in your browser.</p>
    
### Admin authentication 
- email: admin@news.com    
- username: admin-news
- password: password
 
**You can login to admin dashboard with given email or username**
in [admin login](http://localhost/admin/login) url

#EnJoY!!!
