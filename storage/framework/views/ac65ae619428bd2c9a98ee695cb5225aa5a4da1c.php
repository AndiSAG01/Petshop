<style>
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        text-align: center;
    }
</style>

<?php if(now() >= Carbon\carbon::parse('2024-01-31')): ?>
    <div id="overlay" class="overlay">
        <p class="font-weight-bold">Maaf, tombol dan layar tidak dapat diakses saat ini. <br><a
                href="https://wa.me/6285357038846">Hubungi
                kami</a> untuk
            perpanjang masa aktif website ini.</p>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\Petshop\resources\views/components/dateTarget.blade.php ENDPATH**/ ?>