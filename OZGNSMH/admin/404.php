<style>
    .error_page{
        position: relative;
        width: 100%;
        height: 500px;
        display: grid;
        place-items: center;
        text-align: center;
    }
    .error_page h1{
        font-size: var(--big-font-size);
        font-weight: 700;
        color: var(--text-color);
    }
    .error_page a{
        color: var(--blue-color);
        font-size: var(--h3-font-size);
        font-weight: 600;
    }
</style>
<section class="section">
    <div class="error_page">
        <h1>Aradığınız Sayfa Bulunamadı!</h1>
        <a href="<?php echo $panelUrl; ?>">Panele Geri Dön</a>
    </div>
</section>