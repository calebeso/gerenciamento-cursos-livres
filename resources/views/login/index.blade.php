<!doctype html>
<html lang="pt-br">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<body>
<form method="post">
@csrf
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="form2Example1" class="form-control" />
    <label class="form-label" for="form2Example1">Usuário</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Senha</label>
  </div>

  <!-- Submit button -->
  <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>

  
</form>

</body>
</html>