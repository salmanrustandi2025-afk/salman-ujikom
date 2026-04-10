<?php
session_start();

/* HAPUS SESSION */
session_unset();
session_destroy();

/* PINDAH KE HALAMAN AWAL */
header("Location: index.php");
exit;