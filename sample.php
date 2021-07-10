<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"/>
    <link type="text/css" rel="stylesheet" media="only screen and (max-device-width: 480px)" href="styleMedia.css"/>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>AlexSusanu</title>
</head>
<body>
        <form>
            <div class="subMain">
                <div id="firstName">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName"/>
                </div>

                <div id="lastName">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName">
                </div>
            </div>

            <div class="subMain">
                <div id="emailAddress">
                    <label for="emailAddress">Email Address</label>
                    <input type="text" id="emailAddress">
                </div>

                <div id="telephoneNumber">
                    <label for="telephoneNumber">Telephone Number</label>
                    <input type="text" id="telephoneNumber">
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
                <input type="submit" value="Submit">
            </div>
        </form>
</body>
</html>