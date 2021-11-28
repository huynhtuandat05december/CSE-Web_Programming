$(document).ready(function () {
  // Add smooth scrolling to page-body
  $('.back-to-top').on('click', function (event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== '') {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate(
        {
          scrollTop: $(hash).offset().top,
        },
        800,
        function () {
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        }
      );
    } // End if
  });
});

function validateData() {
  var flag1 = checkName(
    document.getElementById('name'),
    document.getElementById('validateName')
  );
  var flag2 = checkEmail(
    document.getElementById('email'),
    document.getElementById('validateEmail')
  );
  var flag3 = checkSubject(
    document.getElementById('subject'),
    document.getElementById('validateSubject')
  );
  var flag4 = checkMsg(
    document.getElementById('message'),
    document.getElementById('validateMessage')
  );
  if (flag1 && flag2 && flag3 && flag4) {
    var name = '&name=' + document.getElementById('name').value;
    var email = '&email=' + document.getElementById('email').value;
    var subject = '&subject=' + document.getElementById('subject').value;
    var message = '&message=' + document.getElementById('message').value;
    var action = 'action.php?action=contact' + name + email + subject + message;

    $.get(action, function (data, status) {
      if (data == 'Send message successfully!!!') {
        document.getElementById('message-box').style.display = 'block';
      } else alert(data);
    });
    return false;
  }
  return false;
}

function checkName(name, validate) {
  if (name.value.length < 4) {
    name.style.border = '2px solid red';
    name.classList.add('animate__shakeX');
    validate.innerHTML = name.getAttribute('data-msg');
    validate.style.display = 'block';
    return false;
  } else {
    name.style.border = '1px solid lightgrey';
    name.classList.remove('animate__shakeX');
    validate.style.display = 'none';
    return true;
  }
}

function checkEmail(email, validate) {
  var reg = /[^@]+@[^@]+.[^@]+/;
  if (!email.value.match(reg)) {
    email.style.border = '2px solid red';
    email.classList.add('animate__shakeX');
    validate.innerHTML = email.getAttribute('data-msg');
    validate.style.display = 'block';
    return false;
  } else {
    email.style.border = '1px solid lightgrey';
    email.classList.remove('animate__shakeX');
    validate.style.display = 'none';
    return true;
  }
}

function checkSubject(subject, validate) {
  if (subject.value.length < 8) {
    subject.style.border = '2px solid red';
    subject.classList.add('animate__shakeX');
    validate.innerHTML = subject.getAttribute('data-msg');
    validate.style.display = 'block';
    return false;
  } else {
    subject.style.border = '1px solid lightgrey';
    subject.classList.remove('animate__shakeX');
    validate.style.display = 'none';
    return true;
  }
}

function checkMsg(msg, validate) {
  if (msg.value == '') {
    msg.style.border = '2px solid red';
    msg.classList.add('animate__shakeX');
    validate.innerHTML = msg.getAttribute('data-msg');
    validate.style.display = 'block';
    return false;
  } else {
    msg.style.border = '1px solid lightgrey';
    msg.classList.remove('animate__shakeX');
    validate.style.display = 'none';
    return true;
  }
}

/*Type writter effect*/
var TxtType = function (el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
};

TxtType.prototype.tick = function () {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

  var that = this;
  var delta = 200 - Math.random() * 100;

  if (this.isDeleting) {
    delta /= 2;
  }

  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }

  setTimeout(function () {
    that.tick();
  }, delta);
};

window.onload = function () {
  var elements = document.getElementsByClassName('typewrite');
  for (var i = 0; i < elements.length; i++) {
    var toRotate = elements[i].getAttribute('data-type');
    var period = elements[i].getAttribute('data-period');
    if (toRotate) {
      new TxtType(elements[i], JSON.parse(toRotate), period);
    }
  }
  // INJECT CSS
  var css = document.createElement('style');
  css.innerHTML = '.typewrite > .wrap { border-right: 0.08em solid #fff}';
  document.body.appendChild(css);
};

// Preloader
$(window).on('load', function () {
  if ($('#preloader').length) {
    $('#preloader')
      .delay(100)
      .fadeOut('slow', function () {
        $(this).remove();
      });
  }

  const signUpButton = document.getElementById('signUp');
  const signInButton = document.getElementById('signIn');
  const container = document.getElementById('container');

  signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');
  });

  signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
  });
});

function directInformation() {
  window.location.href = 'user.php';
}

function directLogin() {
  window.location.href = 'login.php';
}

function logout() {
  xmlhttp = new XMLHttpRequest();
  xmlhttp.open('GET', 'action.php?action=logout', true);
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      window.location.href = this.responseText;
    }
  };
  xmlhttp.send();
}

function directSignup() {
  window.location.href = 'signup.php';
}

function edit_information() {
  //Enable form
  document.getElementById('full-name').disabled = false;
  document.getElementById('email').disabled = false;
  document.getElementById('url').disabled = false;
  document.getElementById('telephone').disabled = false;
  document.getElementById('birthday').disabled = false;

  //Create button cancel and button save information
  var cancel = document.createElement('button');
  var button =
    '<button class="btn btn-outline-primary btn-lg btn-rounded px-5 mx-5" onclick="cancel_edit()">Cancel</button>';
  button +=
    '<button class="btn btn-primary btn-lg btn-rounded mx-5 px-5" onclick="save_information()">Save</button>';

  document.getElementById('button-group').innerHTML = button;
}

function cancel_edit() {
  //Disable form
  document.getElementById('full-name').disabled = true;
  document.getElementById('email').disabled = true;
  document.getElementById('url').disabled = true;
  document.getElementById('telephone').disabled = true;
  document.getElementById('birthday').disabled = true;

  //Create button edit
  var button =
    '<button class="btn btn-outline-primary btn-lg btn-rounded" onclick="edit_information()">Edit information</button>';
  document.getElementById('button-group').innerHTML = button;
}

function save_information() {
  //Get value
  var fullname = '&fullname=' + document.getElementById('full-name').value;
  var email = '&email=' + document.getElementById('email').value;
  var url = '&url=' + document.getElementById('url').value;
  var telephone = '&telephone=' + document.getElementById('telephone').value;
  var birthday = '&birthday=' + document.getElementById('birthday').value;
  var action =
    'action.php?action=changeinfo' +
    fullname +
    email +
    url +
    telephone +
    birthday;
  $.get(action, function (data, status) {
    alert(data);
  });

  //Disable form
  document.getElementById('full-name').disabled = true;
  document.getElementById('email').disabled = true;
  document.getElementById('url').disabled = true;
  document.getElementById('telephone').disabled = true;
  document.getElementById('birthday').disabled = true;

  //Change button to edit
  var button =
    '<button class="btn btn-outline-primary btn-lg btn-rounded" onclick="edit_information()">Edit information</button>';
  document.getElementById('button-group').innerHTML = button;
}

function changepassword() {
  var password = document.getElementById('password-change').value;
  var newpassword = document.getElementById('new-password-change').value;

  $.post(
    'action.php',
    {
      action: 'changepassword',
      oldPassword: password,
      newPassword: newpassword,
    },
    function (data, status) {
      if (data == 'Change password successfully!!!') {
        alert(data + '\nPlease log in again');
        logout();
      } else {
        alert(data);
      }
    }
  );
}

function validateConfirm() {
  var newpassword = document.getElementById('new-password-change').value;
  var confirmpassword = document.getElementById(
    'confirm-password-change'
  ).value;
  if (newpassword != confirmpassword) {
    document.getElementById('confirmErr').innerHTML =
      'Confirm password does not match!!!';
  } else {
    document.getElementById('confirmErr').innerHTML = '';
  }
}

function sendComment(id) {
  var data = document.getElementById('comment').value;
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  today = yyyy + '-' + mm + '-' + dd;

  $.post(
    'action.php',
    { action: 'comment', product_id: id, comment: data, date: today },
    function (data, status) {
      alert(data);
      window.location.href = 'detail.php?id=' + id;
    }
  );
}

function searchProducts(e) {
  var value = document.getElementById('searchText').value;
  if (value == '') return false;
  if (e.keyCode === 13) {
    //Search for products here
    var action = 'products.php?action=search&value=' + value;
    window.location.href = action;
  }
  return false;
}

function searchButton() {
  var value = document.getElementById('searchText').value;
  if (value == '') return false;
  //Search for products here
  var action = 'products.php?action=search&value=' + value;
  window.location.href = action;
}

