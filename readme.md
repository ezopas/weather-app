## Screenshot
![Weather app](https://i.imgur.com/sWQjpJ3.jpg)

# Weathers page

## Vision:
Create simple weathers page. The page should have two main parts - form and tabs with
weathers. The form should have two text inputs (token and city) and submit button. Tabs should
contain only basic information of the city.
Tools and libraries:
Bootstrap 4 (http://getbootstrap.com/);
jQuery (http://jquery.com/);
PHP framework (Laravel/Symfony) for communication between weather API and page;
Weather API:
http://openweathermap.org/current or any other JSON based service.
Requirements:
- The API key should entered into first input field.

Example of API key: 44db6a862fba0b067b1930Da0d769e98
Example of full URL:
http://api.openweathermap.org/data/2.5/weather?q=Vilnius&appid=44db6a862fba0b067b1930
da0d769e98
- The city name should be entered into second input field.

- The submit button is green on right side.
- The form’s data should be submitted via AJAX to back end system.
- Backend system should call to external data provider.
- The response of external data should be passed to front-end system as general data
format.
- The possibility to add other providers should be investigated.
- Each new city should be shown as new tab with data inside.
