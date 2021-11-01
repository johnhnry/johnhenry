
# Register/Login 
Register/Login for Time Management and Scheduling System this will collect the data of user and will save it on the database.


## Instruction
Download the files  `login.php` , `verify.php`, `register.php` , `connection.php`and 
Rename the file `.env.sample` in the `src/` folder to `.env` then edit and replace the content with your API key.
```
TWILIO_AUTH_TOKEN="xxxxxxxxxxxxxxxxxxxxx"
TWILIO_ACCOUNT_SID="xxxxxxxxxxxxxxxxxxxxx"
TWILIO_SERVICE_SID="xxxxxxxxxxxxxxxxxxxxxxx"
MAILGUN_API_KEY="xxxxxxxxxxxxxxxxxxxxxxxx"
MAILGUN_EMAIL_DOMAIN="example.com"
```
To test the program just got the `src/` folder then run `python app.py`

> Environment Variable Definitions

ENV VAR | Notes
--- | ---
TWILIO_AUTH_TOKEN | Your Twilio account authentication token.
TWILIO_ACCOUNT_SID | Your Twilio account SID.
TWILIO_SERVICE_SID | Twilio Notify service SID.
MAILGUN_API_KEY | Generated API sending key on `mailgun.com`
MAILGIN_EMAIL_DOMAIN | Your domain name that you are using on `mailgun.com`


### Using docker and docker-compose
To build the docker image and run the image into the container just use `docker-compose` command from the `notificatin-system/` directory:
```
docker-compose up --build
```
