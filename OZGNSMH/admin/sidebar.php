<?php !defined("admin") ? header("location: hatali-sayfa") : null ?>
<input type="checkbox" id="side">
<div class="sidebar">
    <div class="check">
        <label for="side"><i class="bi bi-grid"></i> </label>
        <span>Yönetim Paneli</span>
    </div>
    <div class="links">
        <a class="link" href="hakkinda-sayfasi"><i class="bi bi-person"></i> <span id="name">Hakkımda Sayfası</span></a>
        <a class="link" href="bloglar"><i class="bi bi-pen"></i> <span id="name"> Çalışmalar</span></a>
        <a class="link" href="postlar"><i class="bi bi-chat-left-dots"></i> <span id="name"> Postlar</span></a>
        <a class="link" href="ayarlar"><i class="bi bi-gear"></i> <span id="name"> Ayarlar</span></a>
        <a class="link logout" href="cikis"><i class="bi bi-box-arrow-left"></i> <span id="name">Çıkış</span></a>
    </div>
</div>
<input type="checkbox" id="side">

