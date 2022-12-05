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

#### Instead of using prepared statement on the email directly, since email is a string, use single quotes '', insert value from the form, use the sprintf function putting a string placeholder, where we want the value from the database to be stored. '%s'"; , pass in array from the post super global to avoid SQL injection attack, we need to escape the value coming from the form using the real_escape_string function from the mysqli object.

#### Call the query method on the mysqli object passing in sql as argument, this returns a result object and assign a variable to get data from the result object, then we call the fetch_assoc method which will return the record if it is found in the database in the form of an associative array. Print out the assoc array stored in the user variable if the record is found.

#### Instead of printing it out, check that the user variable contains an array of data and is null, which can be achieved by using a simple if statement. Check the password if the record was found for that user email addresss, then verify if if the plain password in the $_POST from the password field matches the hash password stored in the database in the $password_hash variable.Returns true if they match and false otherwise. If they match print out a message and stop the script. If the correct details are entered the login succesful message will be displayed. If the credentials are incorrect, a blank login page will be shown. To make this a bit more user friendly, first show a message telling the user that the login was invalid.

#### At the top of the script  add a variable called $is_invalid and set it to false, then at the end of the "if" block that will be executed when the form is syubmitted, let's set it to true. Once we reach that point in the script, when the form is submitted, either the email or password was invalid. Then in the html if the variable is true, display a message saying the credentials are invalid.

#### When the credentials are invalid, keep the value of the email address, to do this add a value attribute to the email input, specifying the email element of the post array. When we first log the form this will be empty, so we will use the null coalescing operator to default it to an empty string.  As this is entrusted content we need to escape it, using the htmlspecialchars function. The value of the email will be remembered when invalid credentials are entered, after the submission of the form.

#### Instead of showing the login succesful message, we can now log the user in, to do this store the user id in a session. Sessions are used to remember values used between browser requests. Add a new file to show if the user is logged in or not. Create an index.php file which will be the home page, when a user is usccesfully logged in. Inorder to use the sesiion on this page use the session_start() method.

#### Once the session is started we can store values in the $_SESSION super global and there persists a cross request. Start or resume the session on the login page, store the user id in the $_SESSION super global and redirect to the index page and exit the script.

#### Add html codes to the index.php page, after this check to see if the user id is set in the session using the isset() function and if it is print out a message. If it is not set display links to the login page, so the user can log in or sign up succesfully.

#### We need to add a logout functionality, so we'll be able to see how all this looks if we are not loged in. Add a new file called logout.php

#### To destroy the session on this logout page, we call the session_destroy() function, once we've done that, we will be redirected to the index page, but we won't be logged out. Even if we include the session_destroy() on the logout page, for us to be logged out we need to first call the session_start() function. Anytime you use a session you need to call the session_start().

#### Let's make the login page a bit more user friendly, we will add the name of the user that is logged in. In the index or home page, let's check for the user id value in the session array, if this is set we can retrieve the record from the database, that corrresponds to that user id.

#### Require the database script to get the connection, then write the sql to select the user record where the id, equals the value in the session, we don't need to escape it, as it is a value we have already set upin the session by ourselves.

#### Then we'll run that using the query() method on the mysqli object, passing in the sql to get the result object. Finally, we'll get an associative array containing the records values, using the fetch_assoc() method, and assign it to a variable.

#### In the html code, instead of checking the session, let's check if the user variable is set, then instead of printing out the previous message that was there, we'll print out a greeting with the logged in user's name, making sure we escape it with the htmlspecialchars function, as it is untrusted content. Before we try this, there is one more thing we need to add to the login page.

#### As we're starting the session at the top of the index page when we load the login page, the session will already be started, this could make the code vulnerable to a session fixation attatck, to avoid this once we've logged in successfully, we regenerate the id by calling the session_regenerate_id() function. When we refresh the page now, we will se the personalized message.

#### Let's make the signup page more user friendly by adding client-side validation using Javascript, to do this let's use the justvalidate js validation library that has no dependencies and is available on a cdn. All we need to do to include it, is to copy the script tag and paste it in the head section of the signup form.

#### Then add a new file that will contain the custom javascript for the signup page, add another script(the validation.js) with defer attributes to both of the scripts tag, to ensure they're loaded in order

#### For us to easily identify the form let's add an id attribute to the form tag, then in the validation.js file we'll create a new just validate object, passing in the selectorfor the form, next we can add validation rules for each field

#### Let's start with the name, we call the add field method on the validation object, with the field selector as the first argument, and an array of rules as the second.

#### Each rule is an object where we can specify one of the library's built-in rules using the rule property with the name of the rule as the value for the name, let's just make it required. Let's test to see if it's working so far. In the sign up form if I try to submit with an empty first and last name we get the required field validation message printed out below the input and the input focus is placed in that input. If I type a value the validation message is removed.

#### Next let's add some validation on the email input, we'll make it required and also that it's a valid email address. In the browser now the email field is required and also needs to be a valid email address.

#### Next the password which we'll make required, and also use the password rule which requires the password to be at least eight characters and contain at least one letter and at least one number. In the browser now the password is validated.

#### Next we'll validate the password confirmation input, there isn't a built-in rule to validate that two fields are equal but we can add a custom  validation rule with the validator property, the value is a function that takes two arguments, the value of the input being validated and an array of the other fields in the form, if we return true from this function then it's considered valid and invalid if false is returned so we can just return the result of comparing the equality of the field value and the value of the password field. Let's also specify a custom message for when this field is invalid, which we do using the error message property.

#### In the browser now the password confirmation field is validated to match the password field. Once all the validations has passed we need to manually submit the form as the validation library has prevented this default behavior. Do this by calling the onsuccess method passing in a callback function. In this function we'll get the form element and call the submit method on it.

#### In the browser if the validation passes the form submits.

#### but we haven't validated if the email is already taken, if I resubmit the form again with the same details, we get the server side email validation message. To validate if the email address is available or not we have to check this in the database, so we'll have to make a request to the server.

#### Let's create a new file called validate-email.php, in this file all we want to do is check the user table to see if a record already exists with a given email address.

#### First let's connect to the database, by requiring the database file, then we'll write some sql to select any records from the database where the email is equal to a value that will pass in using the query string, we'll use the sprintf function to insert the value from the query string into the sql making sure we escape it then we'll run it using the query method.

#### To see if the email exists we can check the number of rows in the result set, if this is equal to 0 the email address is available so we'll assign that boolean value to a variable, as we'll be making this request from javascript we'll output this as json. Let's add the json content type header and output the is_available variable as json.

#### Before we call that from javascript, let's test it in the browser, we'll call call the validate-email script by passing in an email address in the query string, if we try an email address that doesn't exist in the database we get true, now we can call this from the javascript validation code as with the password confirmation field, we'll add a custom validator to the email field, we don't need the fields argument to the callback function, as all we need is the value of the field inside this function we'll make a request using fetch to the script we just added we'll add the value of the field from the form in the query string making sure we uri encode it this returns a promise object so we can then call the then() method on that passing in a function to pass the json response and return this as a javascript object, this in turn returns a promise object so we can call then on that passing in a function that simply returns the value of the available property which will be true or false as we just saw in the browser finally we'll return this promise from the custom validator function. in addtion to the custom validator let's also add a custom error message.

#### In the browser if we enter a email that already exists in our database it will display below the email field "Email is already taken", if we enter an email that doesn't exist it will take us to the signup page.. note this client-side validation does not replace the server-side validation, it's important to always have server-side validation as the client-side validation can be bypassed



