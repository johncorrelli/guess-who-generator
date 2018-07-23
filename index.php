<html>
<head>
<title>Guess Who?!</title>
<link rel="stylesheet" type="text/css" href="styles.css"></link>
</head>

<body>
<?php
    include './helpers.php';

    $characters = get_characters();

    if (count($characters) === 0) {
        echo 'Eek! You do not have any characters in the `pics/` directory. ';
        echo 'Add `.png` files, then reload this page.';
        die();
    }

    // Display small character cards
    // Display the small characters two times, one for each player's board.
    array_walk($characters, function($character) {
        echo display_character($character, 'small');
        echo display_character($character, 'small');
    });

    echo '<div class="break"></div>';

    // Display large character cards
    array_walk($characters, function($character) {
        echo display_character($character, 'large');
    });
?>
</body>
</html>
