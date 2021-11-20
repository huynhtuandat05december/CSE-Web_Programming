const primaryColor = '#4834d4';
const warningColor = '#f0932b';
const successColor = '#6ab04c';
const dangerColor = '#eb4d4b';

const themeCookieName = 'theme';
const themeDark = 'dark';
const themeLight = 'light';

const body = document.getElementsByTagName('body')[0];

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return ""
}

loadTheme()

function loadTheme() {
    var theme = getCookie(themeCookieName);
    body.classList.add(theme === "" ? themeLight : theme);
}

function switchTheme() {
    if (body.classList.contains(themeLight)) {
        body.classList.remove(themeLight);
        body.classList.add(themeDark);
        setCookie(themeCookieName, themeDark);
    } else {
        body.classList.remove(themeDark);
        body.classList.add(themeLight);
        setCookie(themeCookieName, themeLight);
    }
}

function collapseSidebar() {
    body.classList.toggle('sidebar-expand');
}

window.onclick = function (event) {
    openCloseDropdown(event)
}

function closeAllDropdown() {
    var dropdowns = document.getElementsByClassName('dropdown-expand');
    for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].classList.remove('dropdown-expand');
    }
}

function openCloseDropdown(event) {
    if (!event.target.matches('.dropdown-toggle')) {
        // 
        // Close dropdown when click out of dropdown menu
        // 
        closeAllDropdown()
    } else {
        var toggle = event.target.dataset.toggle;
        var content = document.getElementById(toggle);
        if (content.classList.contains('dropdown-expand')) {
            closeAllDropdown();
        } else {
            closeAllDropdown();
            content.classList.add('dropdown-expand');
        }
    }
}


function login() {
    var usernameValue = document.getElementById('username').value;
    var passwordValue = document.getElementById('password').value;

    $.post(
        "action.php",
        { action: "login", username: usernameValue, password: passwordValue },
        function (data, status) {
            alert(data);
            if (data == "Login successfully!") window.location.href = "dashboard.php";
        }
    );
}


function validateConfirm() {
    var newpassword = document.getElementById('new-password-change').value;
    var confirmpassword = document.getElementById('confirm-password-change').value;
    if (newpassword != confirmpassword) {
        document.getElementById('confirmErr').innerHTML = "Confirm password does not match!!!";
    }
    else {
        document.getElementById('confirmErr').innerHTML = "";
    }
}

function changeProfile() {
    var fullnameValue = document.getElementById("full-name").value;
    var emailValue = document.getElementById("email-profile").value;
    var phoneValue = document.getElementById("phone-profile").value;
    var urlValue = document.getElementById("url-profile").value;
    var birthdayValue = document.getElementById("birthday").value;

    $.post(
        "action.php",
        { action: "edit_profile", fullname: fullnameValue, email: emailValue, phone: phoneValue, url: urlValue, birthday: birthdayValue },
        function (data, status) {
            alert(data);
            if (data == "Change profile successfully!") window.location.href = "dashboard.php";
        }
    );
}

function changePassword() {
    var oldPassword = document.getElementById("password-change").value;
    var newPassword = document.getElementById("new-password-change").value;

    $.post(
        "action.php",
        { action: "change_password", old_password: oldPassword, new_password: newPassword },
        function (data, status) {
            alert(data);
            if (data == "Change password successfully!") logOut();
        }
    );
}

function logOut() {
    $.post(
        "action.php",
        { action: "logout" },
        function (data, status) {
            window.location.href = "login.php";
        }
    );
}

function changeInfo() {
    var addressValue = document.getElementById('address').value;
    var telephoneValue = document.getElementById('telephone').value;
    var emailValue = document.getElementById('email-info').value;
    var detailValue = document.getElementById('detail').value;

    $.post(
        "action.php",
        { action: "change_info", address: addressValue, phone: telephoneValue, email: emailValue, detail: detailValue },
        function (data, status) {
            alert(data);
            if (data == "Change information successfully!") window.location.href = "dashboard.php";
        }
    )
}

function checkEnter(e) {
    if (e.keyCode === 13) {
        //Search for products here
        login();
    }
}


function editProduct(product_id_value) {
    var idValue = document.getElementById('id-edit-' + product_id_value).value;
    var nameValue = document.getElementById('name-edit-' + product_id_value).value;
    var authorValue = document.getElementById('author-edit-' + product_id_value).value;
    var typeValue = document.getElementById('type-edit-' + product_id_value).value;
    var urlValue = document.getElementById('url-edit-' + product_id_value).value;
    var priceValue = document.getElementById('price-edit-' + product_id_value).value;

    $.post(
        "action.php",
        { action: "edit_product", new_id: idValue, name: nameValue, author: authorValue, type: typeValue, url: urlValue, price: priceValue },
        function (data, status) {
            alert(data);
            if (data == "Change product information successfully!")
                window.location.href = "product.php";
        }
    );
}

function deleteProduct(product_id) {

    if (confirm("Delete this products?")) {
        $.post(
            "action.php",
            { action: "delete_product", id: product_id },
            function (data, status) {
                alert(data);
                if (data == "Delete product successfully!\nDelete comment with product_id = " + product_id + " successfully!")
                    window.location.href = "product.php";
            }
        );
    }
}
// edit user name in user.php
function editUser(user_id) {
    var id = document.getElementById("id-edit-" + user_id).value;
    var username = document.getElementById("username-edit-" + user_id).value;
    var email = document.getElementById("email-edit-" + user_id).value;
    var full_name = document.getElementById("full-name-edit-" + user_id).value;
    var url = document.getElementById("url-edit-" + user_id).value;
    var telephone = document.getElementById("telephone-edit-" + user_id).value;
    var date_of_birth = document.getElementById("birthday-edit-" + user_id).value;
    $.post(
        "action.php",
        { action: "edit_user", id: id, username: username, email: email, fullname: full_name, url: url, telephone: telephone, date_of_birth: date_of_birth },
        function (data, status) {
            alert(data);
            if (data == "Change user information successfully!") window.location.href = "user.php";
        }
    );
}
function deleteUser(user_id) {

    if (confirm("Delete this User?")) {
        $.post(
            "action.php",
            { action: "delete_user", id: user_id },
            function (data, status) {
                alert(data);
                if (data == "Delete user successfully!")
                    window.location.href = "user.php";
            }
        );
    }
}
// edit staff
function editStaff(staff_id) {
    var id = document.getElementById("id-edit-" + staff_id).value;
    var name = document.getElementById("name-edit-" + staff_id).value;
    var profile = document.getElementById("profile-edit-" + staff_id).value;
    var email = document.getElementById("email-edit-" + staff_id).value;
    var phone = document.getElementById("phone-edit-" + staff_id).value;
    var html = document.getElementById("html-edit-" + staff_id).value;
    var css = document.getElementById("css-edit-" + staff_id).value;
    var php = document.getElementById("php-edit-" + staff_id).value;
    var javascript = document.getElementById("javascript-edit-" + staff_id).value;
    var url = document.getElementById("url-edit-" + staff_id).value;
    var detail = document.getElementById("detail-edit-" + staff_id).value;

    $.post(
        "action.php",
        {
            action: "edit_staff",
            id: id, name: name, profile: profile, email: email, phone: phone,
            html: html, css: css, php: php, javascript: javascript, url: url, detail: detail
        },
        function (data, status) {
            alert(data);
            if (data == "Change staff information successfully!") window.location.href = "staff.php";
        }
    );
}
function deleteStaff(staff_id) {

    if (confirm("Delete this Staff?")) {
        $.post(
            "action.php",
            { action: "delete_staff", id: staff_id },
            function (data, status) {
                alert(data);
                if (data == "Delete staff successfully!")
                    window.location.href = "staff.php";
            }
        );
    }
}
function addProduct() {
    var nameValue = document.getElementById("name").value;
    var authorValue = document.getElementById("author").value;
    var typeValue = document.getElementById("type").value;
    var urlValue = document.getElementById("url").value;
    var priceValue = document.getElementById("price").value;

    $.post(
        "action.php",
        {
            action: "add_product",
            name: nameValue,
            author: authorValue,
            type: typeValue,
            url: urlValue,
            price: priceValue
        },
        function (data, status) {
            alert(data);
            if (data == "Add product successfully!")
                window.location.href = "product.php";
        }
    )

}

function deleteComment(comment_id) {
    $.post(
        "action.php",
        { action: "delete_comment", id: comment_id },
        function (data, status) {
            alert(data);
            if (data == "Delete comment successfully!")
                window.location.href = "product.php";
        }
    )
}

function addUser() {
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var full_name = document.getElementById('full-name').value;
    var url = document.getElementById('url').value;
    var telephone = document.getElementById('telephone').value;
    var birthday = document.getElementById('birthday').value;

    $.post(
        "action.php",
        {
            action: "add_user",
            username: username,
            email: email,
            full_name: full_name,
            url: url,
            telephone: telephone,
            birthday: birthday
        },
        function (data, status) {
            console.log(data)
            alert(data);
            if (data == "Add new user successfully!")
                window.location.href = "user.php";
        }
    )
}
function addStaff() {
    var name = document.getElementById('name').value;
    var profile = document.getElementById('profile').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('profile').value;
    var detail = document.getElementById('detail').value;

    $.post(
        "action.php",
        {
            action: "add_staff",
            name: name,
            email: email,
            profile: profile,
            phone: phone,
            detail: detail

        },
        function (data, status) {
            alert(data);
            if (data == "Add staff successfully!")
                window.location.href = "staff.php";
        }
    )
}