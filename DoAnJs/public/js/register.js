document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // Lấy dữ liệu từ biểu mẫu
    var formData = new FormData(this);

    // Gửi yêu cầu AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/api/register/signup.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            alert(response.message);
        }
    };
    xhr.send(formData);
    window.location.href = "login.html";
});