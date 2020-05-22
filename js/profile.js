var username_input = document.getElementById("username_text_field") ;
var password_input = document.getElementById("password_field") ;
var repeat_password_input = document.getElementById("repeat_password_field");
var save_changes_button = document.getElementById("save_changes_button");
var initial_username_value = document.getElementById("username_text_field").value;
var initial_password_value = document.getElementById("password_field").value;
save_changes_button.disabled = true;


function initialize_changes_form_elements(){
    save_changes_button.disabled = true;
}

function toggle_password_visibility(){
    if (password_input.type === "password"){
        password_input.type = "text";
    }
    // Checkbox can only be either checked or unchecked, "text" or "password" respectively.
    else{
        password_input.type = "password";
    }
}

function toggle_repeat_password_visibility(){
    if (repeat_password_input.type === "password"){
        repeat_password_input.type = "text";
    }
    // Checkbox can only be either checked or unchecked, "text" or "password" respectively.
    else{
        repeat_password_input.type = "password";
    }
}

function button_enable_disable(){

    if (username_input.value.length >= username_input.minLength || 
        password_input.value.length >= password_input.minLength){
        if (username_input.value !== initial_username_value ||
            password_input.value !== initial_password_value &&
            (password_input.value === repeat_password_input.value)){
            save_changes_button.disabled = false;
        }
        else{
            save_changes_button.disabled = true;
        }
    }
    else{
        save_changes_button.disabled = true;
    }
}
