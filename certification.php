<?php
if ($_GET['password'] !== PASSWORD):
?>

<form action="" name="cert">
  <input type="password" name="password" hidden>
</form>

<script>
  const input = prompt('パスワードを入力してください');
  const form = document.forms.cert;
  form.password.value = input;
  form.submit();
</script>

<?php
endif;
?>