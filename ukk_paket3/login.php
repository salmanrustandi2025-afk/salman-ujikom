<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>
body {
    margin:0;
    font-family:Poppins, sans-serif;
    background:#0b3d91;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* CONTAINER SPLIT */
.container {
    width:700px;
    height:400px;
    display:flex;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 20px 40px rgba(0,0,0,0.4);
    animation: slideIn 0.7s ease;
}

/* ANIMASI MASUK */
@keyframes slideIn {
    from {opacity:0; transform:translateY(50px);}
    to {opacity:1; transform:translateY(0);}
}

/* KIRI (LOGO) */
.left {
    flex:1;
    background:white;
    display:flex;
    justify-content:center;
    align-items:center;
}

.left img {
    width:150px;
}

/* KANAN (FORM) */
.right {
    flex:1;
    background:#0b3d91;
    color:white;
    display:flex;
    flex-direction:column;
    justify-content:center;
    padding:30px;
}

input, select {
    width:100%;
    padding:12px;
    margin-top:10px;
    border-radius:20px;
    border:none;
}

button {
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:20px;
    background:white;
    color:#0b3d91;
    font-weight:bold;
    cursor:pointer;
}

/* BUTTON KEMBALI */
.btn-back {
    width:100%;
    padding:12px;
    margin-top:10px;
    border:none;
    border-radius:20px;
    background:#ccc;
    color:#333;
    font-weight:bold;
    cursor:pointer;
}

/* PASSWORD */
.password-box {
    position:relative;
}

.password-box span {
    position:absolute;
    right:15px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
}
</style>

</head>
<body>

<div class="container">

    <!-- KIRI -->
    <div class="left">
        <img src="Bi.jpg">
    </div>

    <!-- KANAN -->
    <div class="right">
        <h2>Login</h2>

        <form method="POST" action="proses_login.php">

            <select name="role" required>
                <option value="">-- Login Sebagai --</option>
                <option value="siswa">Siswa</option>
                <option value="admin">Admin</option>
            </select>

            <input type="text" name="username" placeholder="Username" required>

            <div class="password-box">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <span onclick="togglePassword()" id="eye">👁</span>
            </div>

            <button type="submit">Login</button>

            <!-- TOMBOL KEMBALI -->
            <button type="button" onclick="goIndex()" class="btn-back">
                ← Kembali ke Home
            </button>

        </form>

        <p style="font-size:13px; margin-top:10px;">
            Belum punya akun? <a href="register.php" style="color:white;">Daftar</a>
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

/* FUNCTION KE INDEX */
function goIndex(){
    window.location.href = "index.php";
}
</script>

</body>
</html>