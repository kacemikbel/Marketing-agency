<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US</title>
    <link rel="stylesheet" href="./Assets/css/hire.css">
</head>
<body>  
    
    <div class="form-container">
        <form action="./php/service.php" method="POST">
            <h2>Contact Us</h2>

            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="telephone">Telephone Number</label>
                <input type="tel" name="telephone" id="telephone" required placeholder="123-456-7890">
            </div>

            <div class="form-group">
                <label for="message">Your Message</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>

            <div class="container">
    <p>Select option</p>
    <ul class="ks-cboxtags">
        <li><input type="checkbox" id="checkboxOne" name="option" value="Web development"><label for="checkboxOne">Web development</label></li>
        <li><input type="checkbox" id="checkboxTwo" name="option" value="Web security" checked><label for="checkboxTwo">Web security</label></li>
        <li><input type="checkbox" id="checkboxThree" name="option" value="Web servers" checked><label for="checkboxThree">Web servers</label></li>
        <li><input type="checkbox" id="checkboxFour" name="option" value="Graphic design"><label for="checkboxFour">Graphic design</label></li>
        <li><input type="checkbox" id="checkboxFive" name="option" value="Interior architecture"><label for="checkboxFive">Interior architecture</label></li>
        <li><input type="checkbox" id="checkboxSix" name="option" value="Decoration" checked><label for="checkboxSix">Decoration</label></li>
        <li><input type="checkbox" id="checkboxSeven" name="option" value="Digital strategies"><label for="checkboxSeven">Digital strategies</label></li>
        <li><input type="checkbox" id="checkboxEight" name="option" value="Event marketing"><label for="checkboxEight">Event marketing</label></li>
        <li><input type="checkbox" id="checkboxNine" name="option" value="Urban design"><label for="checkboxNine">Urban design</label></li>
        <li><input type="checkbox" id="checkboxTen" name="option" value="Full-stack development"><label for="checkboxTen">Full-stack development</label></li>
    </ul>
</div>


            <div class="submit-container">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    

   


</body>
</html>
