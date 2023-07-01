<!DOCTYPE html>
<html>
  <head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-to-do-list/1.0.0/bootstrap-to-do-list.rtl.min.css" integrity="sha512-9T1NdqjWrFbCzAdmtAfhtMLnOXOsb0xwcs/B5qlGevZcNc6PePt+ghTACNSQch/WZqq4K3Sn+cXYJhiDIXBJwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <div class="row d-flex justify-content-center align-items-center h-100">
</head>
<body>
<form action = "handelers/updateTask.php?id=<?php echo $_GET['id'];?>" method ="POST" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
<div class="col-12">
  <div class="form-outline">
    <input name ="update" type="text" id="form1" class="form-control" />
    <label class="form-label" for="form1">Enter your updated </label>
  </div>
</div>
<div class="col-12">
  <button type="submit" name ="" class="btn btn-primary">update</button>
</div>

</form>
</body>
</html>
