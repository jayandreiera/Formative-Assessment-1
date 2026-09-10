<?php
$result = "";

if (isset($_POST["submit"])) {
    $name     = $_POST["name"];
    $age      = $_POST["age"];
    $course   = $_POST["course"];
    $grade    = $_POST["grade"];
    $enrolled = $_POST["enrolled"];

    if (
        empty($name) ||
        empty($age) ||
        empty($course) ||
        empty($grade)
    ) {
        $result = "Please complete all required fields.";
    } else {
        $qualified =
            $age >= 18 &&
            $grade >= 75 &&
            $enrolled == "yes";

        if ($qualified) {
            $result = "QUALIFIED";
        } else {
            $result = "NOT QUALIFIED";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Qualification</title>
</head>
<body>

    <h1>Student Qualification Form</h1>

    <form method="POST">
        <label>Student Name</label>
        <br>
        <input type="text" name="name">
        <br><br>

        <label>Age</label>
        <br>
        <input type="number" name="age">
        <br><br>

        <label>Course</label>
        <br>
        <input type="text" name="course">
        <br><br>

        <label>Grade</label>
        <br>
        <input type="number" name="grade" step="0.01">
        <br><br>

        <label>Enrolled</label>
        <br>
        <select name="enrolled">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        <br><br>

        <button type="submit" name="submit">Check Qualification</button>
    </form>

    <?php if ($result != "") { ?>
        <h2>Result: <?= $result ?></h2>
    <?php } ?>

</body>
</html>