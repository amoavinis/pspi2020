var username_input = document.getElementById("username_text_field") ;
var password_input = document.getElementById("password_field") ;
var save_changes_button = document.getElementById("save_changes_button");
var initial_username_value = document.getElementById("username_text_field").value;
var initial_password_value = document.getElementById("password_field").value;
save_changes_button.disabled = true;


function initialize_changes_form_elements(){
    var save_changes_button = document.getElementById("save_changes_button");
    save_changes_button.disabled = true;
}

function toggle_password_visibility(){
    var user_password = document.getElementById("password_field");
    if (user_password.type === "password"){
        user_password.type = "text";
    }
    // Checkbox can only be either checked or unchecked, "text" or "password" respectively.
    else{
        user_password.type = "password";
    }
}

function button_enable_disable(){
    
    alert("username_input.length = " + username_input.value.length +", password_input.length = " + password_input.value.length);

    if (username_input.value.length >= username_input.minLength || 
        password_input.value.length >= password_input.minLength){
        if (username_input.value !== initial_username_value ||
            password_input.value !== initial_password_value){
            save_changes_button.disabled = false;
            alert("Button enabled.");
        }
        else{
            save_changes_button.disabled = true;
            alert("No change has taken place. Turning off button.");
        }
    }
    else{
        save_changes_button.disabled = true;
        alert("Username or password are not long enough.");
    }
}
