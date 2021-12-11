<script src='https://www.google.com/recaptcha/api.js?render=6LcaaJIdAAAAAA5InMRD_SyWrWBcllgh0x7JIUxO'> </script>
<script>
    grecaptcha.ready(function() {
    grecaptcha.execute('6LcaaJIdAAAAAA5InMRD_SyWrWBcllgh0x7JIUxO', {action: 'formulario'})
    .then(function(token) {
    var recaptchaResponse = document.getElementById('recaptchaResponse');
    recaptchaResponse.value = token;
    });});
</script>