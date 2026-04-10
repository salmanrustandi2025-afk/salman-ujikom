<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<style>
body {
    margin:0;
    font-family:Poppins;
    background: linear-gradient(135deg,#7bc6cc,#4aa3a2);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.container {
    width:320px;
    background:white;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 15px 30px rgba(0,0,0,0.2);
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from {opacity:0; transform:translateY(20px);}
    to {opacity:1; transform:translateY(0);}
}

.header {
    background:#0f6f6f;
    color:white;
    padding:25px;
    text-align:center;
}

.form {
    padding:20px;
}

input, select {
    width:100%;
    padding:12px;
    margin-top:10px;
    border-radius:20px;
    border:none;
    background:#f1f1f1;
}

button {
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:20px;
    background:#0f6f6f;
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover {
    background:#0c5c5c;
}

/* PASSWORD EYE */
.password-box {
    position:relative;
}

.password-box span {
    position:absolute;
    right:15px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    font-size:16px;
}
</style>

</head>
<body>

<div class="container">
    <div class="header">
        <h2>Register</h2>
    </div>

    <div class="form">
        <form method="POST" action="proses_register.php">

            <select name="role" required>
                <option value="">-- Daftar Sebagai --</option>
                <option value="siswa">Siswa</option>
                <option value="admin">Admin</option>
            </select>

            <input type="text" name="username" placeholder="Username" required>

            <!-- PASSWORD + ICON -->
            <div class="password-box">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <span onclick="togglePassword()" id="eye">👁</span>
            </div>

            <button type="submit">Daftar</button>
        </form>

        <!-- LINK LOGIN -->
        <p style="text-align:center; margin-top:15px; font-size:14px;">
            Sudah punya akun? 
            <a href="login.php" style="color:#0f6f6f; font-weight:bold; text-decoration:none;">
                Login sekarang
            </a>
        </p>

    </div>
</div>

<script>
function togglePassword(){
    var pass = document.getElementById("password");
    var eye = document.getElementById("eye");

    if(pass.type === "password"){
        pass.type = "text";
        eye.innerHTML = "🙈";
    } else {
        pass.type = "password";
        eye.innerHTML = "👁";
    }
}
</script>

</body>
</html>