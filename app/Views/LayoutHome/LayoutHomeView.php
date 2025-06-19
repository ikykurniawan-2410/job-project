<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?= base_url() ?>icons/logo2.png" />
    <!-- Bootstrap CSS -->
    <link href="<?= base_url() ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/css/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/css/templatemo-topic-listing.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/css/LayoutHomeView.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <title><?= isset($title) ? $title : 'JobStreet' ?></title>
</head>
<body>

    <?= $this->include('LayoutHome/Navbar/NavbarViewPartial') ?>

    <?= $this->renderSection('content') ?>

    <!-- JAVASCRIPT FILES -->
    <script src="<?= base_url() ?>/js/jquery.min.js"></script> <!-- Jquery hanya 1x -->
    <script src="<?= base_url() ?>/js/jquery.sticky.js"></script> <!-- Plugin sticky harus setelah jquery -->
    <script src="<?= base_url() ?>/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap 1x -->
    
    <script src="<?= base_url() ?>/js/click-scroll.js"></script> <!-- Script custom -->
    <script src="<?= base_url() ?>/js/custom.js"></script>
    <script src="<?= base_url() ?>/js/LayoutHomeView.js"></script>
    

    <!-- Fix di click-scroll.js, pastikan cek elemen target -->
    <script>
      $(document).ready(function() {
        $(".navbar").sticky({ topSpacing: 0 });
      });
    </script>

</body>
</html>
