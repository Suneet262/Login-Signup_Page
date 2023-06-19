
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style_home_page.css">
    <style>
    h1{
        color: rgb(74, 113, 113);
    }
    body{
        font-size: larger;
        color: white;
    }
    form{
        background-color: rgb(33, 128, 130);
        width: 50%;
        margin-left: auto;
        margin-right: auto;
        padding: 10px;
    }
    table{

    }
    input{
        width: 100%;
        padding: 8px;
        border-radius: 3px;
        border: 0px solid;
    }
    textarea{
        width: 100%;
    }
    button{
        background-color: rgb(203, 230, 203);
        border: 0px solid;
        padding: 8px;
        font-size: large;
        border-radius: 5px;
    }
    select{
        padding: 8px;
        width:100%;
    }
</style>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <h1>Welcome!!</h1>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="content">
        <!-- <h2>Welcome to the Home Page</h2> -->
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam commodo lacus eget sapien varius, id volutpat enim lacinia.
             Sed consequat tellus et nibh scelerisque tincidunt.</p> -->
    <h1 style="text-align: center;">CLOTHING FORM</h1>
    <form>
        <table cellpadding="4" cellspacing="10" width="90%">
            <tr>
                <td>Name *</td>
            </tr>
            <tr>
                <td><input type="text" required></td>
            </tr>
            <tr>
                <td>Email *</td>
            </tr>
            <tr>
                <td><input type="email" required></td>
            </tr>
            <tr>
                <td>Address *</td>
            </tr>
            <tr>
                <td><textarea></textarea></td>
            </tr>
            <tr><td>Size *</td></tr>
            <tr>
                
                <td><select>
                        <option value="1">Small</option>
                        <option value="2">Medium</option>
                        <option value="3">Large</option>
                        <option value="4">Extra Large</option>
                    </select></td>
            </tr>
            <tr><td>Colour *</tr></td>
            <tr>
                <td><select>
                    
                        <option value="1">Red</option>
                        <option value="2">R.blue</option>
                        <option value="3">P Green</option>
                        <option value="4">C Green</option>
                        <option value="5">N Blue</option>
                        <option value="6">Parrot Green</option>
                        <option value="7">Black</option>
                        <option value="9">Gold</option>
                        <option value="10">Lemon</option>
                        <option value="11">Mango Gold</option>
                        <option value="12">White</option>
                        <option value="13">Gray</option>
                        <option value="14">Gray Milange</option>
                        <option value="15">Antra Milange</option>
                        <option value="16">Light Blue</option>
                        <option value="17">Charcol Grey</option>
                        <option value="18">Lavender</option>
                        <option value="19">Wine</option>
                        <option value="20">Maroon</option>
                </select></td>
            </td></tr>
        </tr>
        <tr><td> Quantity *</td></tr>
        <tr>
            
           <td>
             <input type="number" id="quantity" name="Quantity" min="1" required> </td>
        </tr>
                <td><button type="submit">Submit</button></td>
            </tr>
        </table>
    </form>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2023 MyWebsite. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>