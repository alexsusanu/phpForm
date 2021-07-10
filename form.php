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
    if(isset($_POST['submit'])) {
        $email = $_POST["email"];
        $pattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/";
        if (!preg_match($pattern, $email)) {
            $error_email= "<span class='error'>Please enter valid email, ex: test@test.com</span>";
        }
        mail("alexsusanu@icloud.com", "test", "hello");
    }
?>
<body>
<fieldset>
        <form action="" method="post">
            <div class="subMain">
                <div id="firstName">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" required="required"/>
                </div>

                <div id="lastName">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" required="required">
                </div>
            </div>

            <div class="subMain">
                <div id="emailAddress">
                    <label for="emailAddress">Email Address</label>
                    <input type="email" name="email" id="emailAddress" title="please enter valid email [test@test.com].">
                    <?php echo $error_email ?>
                </div>
<!--                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"-->

                <div id="telephoneNumber">
                    <label for="telephoneNumber">Telephone Number</label>
                    <input type="tel" id="telephoneNumber" required="required" pattern="^[0-9]*$">
                </div>
            </div>

            <div class="subMain">
                <div id="addressOne">
                    <label for="addressOne">Address 1</label>
                    <input type="text" id="addressOne">
                </div>

                <div id="addressTwo">
                    <label for="addressTwo">Address 2</label>
                    <input type="text" id="addressTwo">
                </div>
            </div>

            <div class="subMain">
                <div id="town">
                    <label for="town">Town</label>
                    <input type="text" id="town">
                </div>

                <div id="county">
                    <label for="county">County</label>
                    <input type="text" id="county">
                </div>
            </div>

            <div class="subMain">
                <div id="postcode">
                    <label for="postcode">Postcode</label>
                    <input type="text" id="postcode">
                </div>

                <div id="country"><label for="country">Country</label>
                    <select id="country">
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
                <textarea cols="10" rows="10"></textarea>
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