# Sign-Up
### Build a simple full signup, login, home and logout system using 

### MySQL Database, HTML,  classless CSS framework (Water.css), PHP and Javascript.

####  Start by building the structure(skeleton) using HTML and classless CSS.

#### Once the user clicks register the html form will be submitted with a post method to the process-signup.php where all our validation rules or conditions are written.

#### Validate all the necessary fields on the signup.html page(first name, last name, email, password and also ensure that the password and the confrim password matches) and see that the form that will be submitted to the process-signup.php by the user passes the criteria's that are set.

#### Start with the name fields, if the fields are empty with the is empty method on the $_POST super global and the email field when the user clicks register, exit the page with a message("Name is required").

#### Validate the email, check if the email entered is a valid email adddress, with the FILTER_VALIDATE_EMAIL method return false with a message if it is not.

#### Check the length of the password  with the strlen() function if it is less than 8 characters, exit with a message("password must be at keast 8 characters").

#### Check if the password entered has at least one letter using the regex method calling the $_POST super global on the password field.

#### Check if the password entered has at least one number using the regex method calling the $_POST super global on the password field.

#### Check if the password entered by the user does not match the password entered on the confirm password field, if it does not exit and return a message("password does not match").

#### Hash the plain password  given by the user using the password hash method, called upon the $_POST super global on the password field with the PASSWORD_DEFAULT attribute and  then store it in a variable.

#### Create a database in the PHP, MyAdmin, create a user's table with columns that will hold the ID, first name, last name, email and password.

#### The ID field must be auto incremented, with INT data type, and be the primary key, the first, last name  and email fields must be varchar with length of 255 characters, the email field must be unique with a length of 255 varchar.

#### Create a connection to the database using the mysqli object connect property. Use servername/ host, username, password and the database name,if there is an error stop the script and print out an error message with the specific error code.

#### In the process-signup.php require the database file using the __DIR__ Constant.

#### Insert new records into the database(user's table), first write the SQL with the insert into method specifying the table name and the fields / columns we want to insert the records into, we don't need to add an ID as it is auto incremented. For the values we can use placeholder.

#### Create a new prepared statement  object my calling the statement init method n the mysqli connection object to avoid SQL injection attack.

#### Prepare the mysql statement for excution by calling the prepare method on the statement object, passing in the sql string as an argument. Any stntax error will be caught  if the prepare method returns false then there is a problem with the SQL to catch this we can check for the return value, if it false, we will stop script and display the error etail which we can get from the error property of the connection object.

#### After having the statements to execute let's bind the values into the placeholder, call the bind method on the statement object. As the variables use string we use "ssss" depending on the number of values to be inserted, follow the string with the actual values.Next call the execute method on the statement object.

#### Even if the form is submitted more than once, the record will only be stored one time in the database, because we use the unique index on the email column, so one email address will not be stored twice.

#### Add validation on the email address that prevents us from displaying the success message if the record with that email address already exists in thebdatabase. The execute method returns true if it was successful and false otheriwse.

#### Detect specifc error based on error codes, and redirect to another page when signup is successful.

#### Create a login form, and add the link on the signup succesful page.

#### Add the php codes to the top of the file before the html, when the submit button is clicked the form will be submitted with a post method. When the form is submitted check if the email matches our record from the database. Connect to the database , require the DB php file, and write the SQL statements to select record based on the email address.

#### Instead of using prepared statement on the email directly, since email is a string, use single quotes '', insert value from the form, use the sprintf function putting a string placeholder, where we want the value from the database to be stored. '%s'";, pass in array from the post super global to avoid SQL injectio attack, we need to escape the value coming from the form using the real_escape_string function from the mysqli object.

#### Call the query method on the mysqli object passing in sql as argument, this returns a result object and assign a variable to get data from the result object, then we call the fetch_assoc method which will return the record if it is found in the database in the form of an associative array. Print out the assoc array stored in the user variable if the record is found.

