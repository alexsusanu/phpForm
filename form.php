<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"/>
    <link type="text/css" rel="stylesheet" media="only screen and (max-device-width: 1024px)" href="styleMedia.css"/>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name = "viewport" content = "width = device-width">
    <title>AlexSusanu</title>
</head>

<?php
//    $emailSender = "testing@mousetrap.dev"; //testing email
    $emailError = "<span class='error'>Please enter valid email, ex: test@test.com</span>";
    $emailSuccess = "Form sent!";

    //user information variables
    $emailDestination = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $addressOne = $_POST['addressOne'];
    $addressTwo = $_POST['addressTwo'];
    $town = $_POST['town'];
    $county = $_POST['county'];
    $postcode = $_POST['postcode'];
    $country = $_POST['country'];
    $description = $_POST['description'];

    //copy of the form
    $subject = "This is a copy of the form" . PHP_EOL;
    $userName = "Hello " . $firstName . " " . $lastName . PHP_EOL;
    $userInfo = "Name: " . $firstName . " " . $lastName . PHP_EOL .
                "Email address: " . $emailDestination . PHP_EOL .
                "Phone number: " . $phoneNumber . PHP_EOL .
                "Address: " . $addressOne . $addressTwo . PHP_EOL .
                "City and postcode: " . $town . " " . $postcode . " " . $county . " " . $country . PHP_EOL .
                "Description: " . $description;
    $message = $subject . $userName . $userInfo;

    if(isset($_POST['submit'])) {
            $pattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/";
            if (preg_match($pattern, $emailDestination)) { //check email validation server side
                mail($emailDestination, $subject, $message);
                header("Location: form.php");
                exit;
            }else {
                echo $emailError;
            }
    }
?>
<body>
<fieldset>
        <form action="" method="post">
            <div class="subMain">
                <div id="firstName">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name = "firstName" required="required"/>
                </div>

                <div id="lastName">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" required="required">
                </div>
            </div>

            <div class="subMain">
                <div id="emailAddress">
                    <label for="emailAddress">Email Address</label>
                    <input type="email" name="email" id="emailAddress" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="please enter valid email [test@test.com].">
                </div>

                <div id="telephoneNumber">
                    <label for="telephoneNumber">Telephone Number</label>
                    <input type="tel" id="telephoneNumber" name="phoneNumber" required="required" pattern="^[0-9]*$">
                </div>
            </div>

            <div class="subMain">
                <div id="addressOne">
                    <label for="addressOne">Address 1</label>
                    <input type="text" id="addressOne" name="addressOne">
                </div>

                <div id="addressTwo">
                    <label for="addressTwo">Address 2</label>
                    <input type="text" id="addressTwo" name="addressTwo">
                </div>
            </div>

            <div class="subMain">
                <div id="town">
                    <label for="town">Town</label>
                    <input type="text" id="town" name="town">
                </div>

                <div id="county">
                    <label for="county">County</label>
                    <input type="text" id="county" name="county">
                </div>
            </div>

            <div class="subMain">
                <div id="postcode">
                    <label for="postcode">Postcode</label>
                    <input type="text" id="postcode" name="postcode">
                </div>

                <div id="country"><label for="country">Country</label>
                    <select id="country" name="country">
                        <?php
                        $countries = file_get_contents('countries.json');
                        $json = json_decode($countries, true);
                        foreach ($json as $item) {
                            echo "<option>";
                            echo $item['name'];
                            echo "</option>'";
                        }
                        ?>
                        <option selected="selected">United Kingdom</option>
                    </select>
                </div>
            </div>
            <div id="description">
                <label for="description">Description</label>
                <textarea cols="10" rows="10" name="description"></textarea>
            </div>
            <div id="browseFile">
                <p>Your C.V</p>
                <p>Select a file &nbsp;<input type="file" value="Browse"></p>
            </div>
            <div id="submit">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </fieldset>
</body>
</html>