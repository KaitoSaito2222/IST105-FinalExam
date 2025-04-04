<?php
$result = null;
if (isset($_POST['items'])) {
    $selected_indices = implode(',', $_POST['items']);
    
    if (!empty($selected_indices)) {
        $command = "python3 party_planner.py " . escapeshellarg($selected_indices);
        $result = shell_exec($command);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Party Planner</title>
</head>
<body>
    <h1>Party Planner</h1>
    <h2>Webserver</h2>
    <h2>Available Party Items:</h2>
    
    <?php if (!$result): ?>
    <form action="party_form.php" method="post">
        <div>
            <div>
                <input type="checkbox" name="items[]" value="0" id="item0">
                <label for="item0">0: Cake</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="1" id="item1">
                <label for="item1">1: Balloons</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="2" id="item2">
                <label for="item2">2: Music System</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="3" id="item3">
                <label for="item3">3: Lights</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="4" id="item4">
                <label for="item4">4: Catering Service</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="5" id="item5">
                <label for="item5">5: DJ</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="6" id="item6">
                <label for="item6">6: Photo Booth</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="7" id="item7">
                <label for="item7">7: Tables</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="8" id="item8">
                <label for="item8">8: Chairs</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="9" id="item9">
                <label for="item9">9: Drinks</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="10" id="item10">
                <label for="item10">10: Party Hats</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="11" id="item11">
                <label for="item11">11: Streamers</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="12" id="item12">
                <label for="item12">12: Invitation Cards</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="13" id="item13">
                <label for="item13">13: Party Games</label>
            </div>
            <div>
                <input type="checkbox" name="items[]" value="14" id="item14">
                <label for="item14">14: Cleaning Service</label>
            </div>
        </div>
        <button type="submit">Calculate Party Code</button>
    </form>
    <?php else: ?>
    <div>
        <div>0: Cake</div>
        <div>1: Balloons</div>
        <div>2: Music System</div>
        <div>3: Lights</div>
        <div>4: Catering Service</div>
        <div>5: DJ</div>
        <div>6: Photo Booth</div>
        <div>7: Tables</div>
        <div>8: Chairs</div>
        <div>9: Drinks</div>
        <div>10: Party Hats</div>
        <div>11: Streamers</div>
        <div>12: Invitation Cards</div>
        <div>13: Party Games</div>
        <div>14: Cleaning Service</div>
    </div>
    <h2>Results:</h2>
    <p><?php echo nl2br(htmlspecialchars($result)); ?></p>
    <a href="party_form.php">Plan Another Party</a>
    <?php endif; ?>
</body>
</html>