<?php

function signUpForm($targetPage) {
    $form = '
    <form method="POST" action="' . htmlspecialchars($targetPage) . '">
        <div>
            <label for="email"> Email: </label>
            <input type="email" name="email" id="email" required="required">
        </div>
        <div>
            <label for="username"> Username: </label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password"> Password: </label>
            <input type="password" name="password" id="password" required="required">
        </div>
        <div>
            <label for="firstName"> First Name: </label>
            <input type="text" name="firstName" id="firstName" required="required">
        </div>
        <div>
            <label for="lastName"> Last Name: </label>
            <input type="text" name="lastName" id="lastName" required="required">
        </div>
        <div>
            <label for="userType"> User Type: </label>
            <select name=userType id="userType" required="required">
                <option value="exhibitor">Exhibitor</option>
                <option value="observer">Observer</option>
                <option value="organizer">Organizer</option>
                <option value="speaker">Speaker</option>
            </select>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    ';
    
    return $form;
}

?>