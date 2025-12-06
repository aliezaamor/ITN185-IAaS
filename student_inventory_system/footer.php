<footer>

    <!-- SOCIAL ICONS -->
    <div class="footer-icons">

        <a href="https://facebook.com" target="_blank" aria-label="Facebook">
            <ion-icon name="logo-facebook"></ion-icon>
        </a>

        <a href="https://x.com" target="_blank" aria-label="X / Twitter">
            <ion-icon name="logo-twitter"></ion-icon>
        </a>

        <a href="https://instagram.com" target="_blank" aria-label="Instagram">
            <ion-icon name="logo-instagram"></ion-icon>
        </a>

    </div>

    <!-- FOOTER STYLES -->
    <style>
        .footer-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            padding: 0px;
            margin-top: 0px;
            margin-bottom: 30px;
        }

        .footer-icons a {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(6px);
            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 36px;
            color: #5A3E2B;
            text-decoration: none;

            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }

        .footer-icons a:hover {
            transform: translateY(-6px) scale(1.15);
            color: #7a543c;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        }
    </style>

    <!-- YOUR EXISTING JS -->
    <script src="page_profile.js"></script>

    <script>
        function resetQuantities() {
            $('.quantity').val(0);
            sessionStorage.clear();
        }
    </script>

    <!-- IONICONS -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</footer>
