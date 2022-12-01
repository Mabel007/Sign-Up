# Sign-Up
### Build a simple full signup,login, home and logout system using 
### MySQL Database, HTML,  classless CSS,PHP and Javascript.

####  Start by building the structure(skeleton) using HTML and classless CSS.

#### Once the user clicks register the html form will be submitted with a post method to the process-signup.php where all our validation rules or conditions are written.

#### Validate all the necessary fields on the signup.html page(first name, last name, email, password and also ensure that the password and the confrim password matches) and see that the form that will be submitted to the process-signup.php by the user passes the criteria's that are set.

#### Start with the name fields, if the fields are empty with the is empty method on the $_POST super global and the email field when the user clicks register, exit the page with a message("Name is required").

#### Validate the email, check if the email entered is a valid email adddress, with the FILTER_VALIDATE_EMAIL method return false with a message if it is not.

#### check the length of the password  with the strlen() function if it is less than 8 characters, exit with a message("password must be at keast 8 characters").

#### check if the password entered has at least one letter using the regex method calling the $_POST super global on the password field.

#### check if the password entered has at least one number using the regex method calling the $_POST super global on the password field.

#### check if the password entered by the user does not match the password entered on the confirm password field, if it does not exit and return a message("password does not match").

#### Hash the plain password  given by the user using the password hash method, called upon the $_POST super global on the password field with the PASSWORD_DEFAULT attribute and  then store it in a variable.