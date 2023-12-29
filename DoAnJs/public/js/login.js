function login() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/api/login/login.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            alert(response.message);
            if (response.success) {
                window.location.href = "home.html";
            }
        }
    };

    var data = JSON.stringify({ email: email, password: password });
    xhr.send(data);
}