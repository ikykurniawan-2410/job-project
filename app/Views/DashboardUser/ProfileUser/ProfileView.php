<?= $this->extend('DashboardUser/DashboardLayout') ?>

<?= $this->section('content') ?>
<div class="d-grid justify-content-center">
    <div class="profile-user text-center">
        <div>
            <img
                style="width: 250px; height: 250px; object-fit:cover;"
                src="<?= base_url() ?>/<?= $profileUser['photo_profile'] ?>" class="img-thumbnail" alt="Photo Profile">
        </div>
        <div class="mx-auto d-grid justify-content-center">
            <p class="fs-3 fw-bold mb-1"><?= esc($profileUser['nama']) ?></p>
            <p class="mb-1 text-center"><?= esc($profileUser['username']) ?></p>
            <p class="text-center">
                <?= str_replace(
                    substr($profileUser['email'], 0, 5),
                    str_repeat('*', strlen($profileUser['email'])),
                    $profileUser['email']
                ) ?>
            </p>
        </div>
        <input class="csrf-token" type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        <div class="d-grid justify-content-center">
            <div class="input-group input-group-sm mb-3">
                <input disabled type="hidden" class="form-control email" value="<?= esc($profileUser['email']) ?>" aria-label="Email">
            </div>
            <button type="button" onclick="showEmail(this)" class="btn btn-primary mx-auto">Show Email</button>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js?render=6LenRqAgAAAAADIwEqG0WKKXjxs1qUIW5t52PL5r"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LenRqAgAAAAADIwEqG0WKKXjxs1qUIW5t52PL5r', {action:'validate_captcha'})
            .then((token) => {
                onSubmit(token)
            })
            .catch((error) => {
                console.log(error)
            })
    });

    function onSubmit(response) {
        const csrfName = document.querySelector('.csrf-token');
        $.ajax({
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            url: "/dashboard_user/get_email",
            type: "post",
            dataType:"json",
            data: {
                [csrfName.getAttribute('name')]: csrfName.getAttribute('value'),
                response : response
            },
            success: function (response) {
                document.querySelector('.email').value = response.email;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    let number = 0;
    function showEmail(e) {
        const emailInput = document.querySelector('.email');
        number++;
        if (number % 2 == 0 ) {
            emailInput.type = 'hidden';
            e.textContent = 'Show Email';
        } else {
            emailInput.type = 'text';
            e.textContent = 'Hide Email';
        }
    }
</script>
<?= $this->endSection() ?>
