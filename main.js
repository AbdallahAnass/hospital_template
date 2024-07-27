// Displays the navigation menu when the user clicks on the icon
function display_menu() {
  const menu = document.getElementById("menu");

  if (menu.style.display == "none" || menu.style.display == "") {
    menu.style.display = "flex";
  } else {
    menu.style.display = "none";
  }
}

// Displays the answer of the question
function display_answer(question) {
  const answer = document.getElementById("a" + question);

  if (answer.style.display == "none" || answer.style.display == "") {
    document.getElementById("q" + question).style.borderColor = "#1b2c51";
    document.getElementById("q" + question).style.color = "#1b2c51";
    answer.style.display = "block";
  } else {
    document.getElementById("q" + question).style.color = "#8d8e92";
    document.getElementById("q" + question).style.borderColor = "#0463fa";
    answer.style.display = "none";
  }
}

// Form validation
function check_empty(id) {
  var element = document.getElementById(id);

  if (element.value == null || element.value == "") {
    element.style.borderWidth = "2px";
    element.style.borderStyle = "solid";
    element.style.borderColor = "red";
    return false;
  } else {
    element.style.border = "none";
  }

  return true;
}

function check_selection(id) {
  var element = document.getElementById(id);

  if (element.value == "Select an option") {
    element.style.borderWidth = "2px";
    element.style.borderStyle = "solid";
    element.style.borderColor = "red";
    return false;
  } else {
    element.style.border = "none";
  }

  return true;
}

function check_email() {
  var element = document.getElementById("email");
  var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

  if (!pattern.test(element.value)) {
    element.style.borderWidth = "2px";
    element.style.borderStyle = "solid";
    element.style.borderColor = "red";

    return false;
  } else {
    element.style.border = "none";
  }

  return true;
}

function check_form() {
  if (
    !check_empty("name") &&
    !check_empty("condition") &&
    !check_selection("department") &&
    !check_empty("doctor") &&
    !check_email()
  ) {
    alert("Please make sure you filled out all the fields");
    return false;
  }

  return true;
}

// Contact form check
function check_formC() {
  if (!check_empty("name") && !check_empty("Subject") && !check_email()) {
    alert("Please make sure you filled out all the fields");
    return false;
  }

  // Message check
  var message = document.getElementById("Message");

  if (message.value == null || message.value == "") {
    message.style.borderWidth = "2px";
    message.style.borderStyle = "solid";
    message.style.borderColor = "red";
    return false;
  } else {
    message.style.border = "none";
  }

  return true;
}
