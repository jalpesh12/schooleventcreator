## About schooleventcreator

Schooleventcreator is help to create events for the school.

## Installation

- Requires PHP verison 7.1.3 or higher
- Requires mysql
- Optional Docker

### Clone

- Clone this repo to your local machine using `https://github.com/jalpesh12/schooleventcreator` or by clicking download button.

### Setup
- Start your mysql and run the script from the folder called databasescript from that run the schoolmaster.sql `https://github.com/jalpesh12/schooleventcreator/tree/master/databasescript` into your mysql.
- Go to project root and run
```
php artisan serve --port=8080
```
- run localhost:8080 in your browser.
- You can now register or login I have test login if you want to use then you can use
```
email - sentra@sentral.com
password - 123456
```
## Notes

While registration the address you enter will be the base address for that school. It is used to clacualte distance from school to venue.
I actually could able to do sorting, filtering functionality. Even I haven't added payment details such as how much payment received.
Lets have a call or meeting to explain how I did, what I did, what I understand, What I want to do but didn't completed n all such things.
