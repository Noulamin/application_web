
function open_sign_up()
{
    document.getElementById("container_sign_up").style.display = "block";
    document.getElementById("container_sign_in").style.display = "none";
}

function open_sign_in()
{
    document.getElementById("container_sign_up").style.display = "none";
    document.getElementById("container_sign_in").style.display = "block";
}

function open_form()
{
    document.getElementById("form_back").style.display = "block";
    document.getElementById("form_back_").style.display = "block";
}

function close_form()
{
    document.getElementById("form_back").style.display = "none";
    document.getElementById("form_back_").style.display = "none";
}

function exit()
{
    window.alert("fefefe");
    document.getElementById("email_login").style.border = "3px solid red";
}