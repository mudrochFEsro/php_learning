<?php

    $response = null;
    $data = null;

if (!empty($_GET["name"])) {
    $response = file_get_contents("https://api.agify.io?name={$_GET['name']}");
}

if (!empty($response)) { // Kontrola, či $response nie je false alebo prázdna
    $data = json_decode($response, true);
}

    $age = $data["age"] ?? null; // Použi null coalescing operator pre zabezpečenie

?>
<!DOCTYPE html>
<html>

<head>
    <title>Example</title>
</head>

<body>

    <?php if (isset($age)): ?>
        Age: <?= $age ?>
    <?php endif; ?>

    <form>
        <label for="name">Name</label>
        <input name="name" id="name">
        <button>Guess age</button>
    </form>
</body>

</html>