<?php
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
  <title>Document</title>
</head>
<style>
  body {

    background: linear-gradient(69.66deg, #00C1FE 19.39%, #FAFFC1 96.69%);
    width: 100%;
    height: 100px;
  }
 .cont {
    width: 100%;
    transform: translateY(50px);
 }
 .contain {

  border-radius: 20px;
    height: 580px;
    width: ;
}

  .href{
    font-size: 10px;
  }
  @media screen and (max-width: 576px) {
    body{
    background: white;
  }
}
</style>
</head>

<body>
<div class=" pt-5 cont row-sm">

<?php
    $conn;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "e_class_users";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $id = $_GET['id'];
    $res = $conn -> query("SELECT * FROM students where id = '$id'");
    //

    $row = $res -> fetch_assoc();

    //var_dump($row);


    if(isset($_POST['update'])){

        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $phone = $_POST['phone'];
        $Enroll_Number = $_POST['Enroll_Number'];
        $DateOfAdmission = $_POST['DateOfAdmission'];

        $req = "UPDATE students SET  Name_ = '$Name', Email_ = '$Email', Phone_ ='$phone', Enroll_Number_ ='$Enroll_Number', Date_of_admission_ = '$DateOfAdmission' where id = '$id'";
        $conn  -> query($req);
        header('location: dashboard_student.php');
    }

?>
<main class="container-fluid mt-0 mt-auto ">
  <div class=" pb-5 cont row-sm">
    <div class="container rounde w-25  p-3 bg-white col-8 col-md-6 col-lg-4  contain row-sm w-50 ">
           
      <form   method="POST"  class="formlair ps-3 pe-3 ">
        <h3 class=" fw-bold  chadow m-3  text-dark d-flex justify-content-center "> enter student's infos to update it </h3>

        <div class="mb-3 row-sm ">
          <label class="form-label text-dark ">Name</label>
          <input type="text" class="form-control text-muted shadow-none" name="Name" value="<?php echo $row['Name_']; ?>">
        </div>
        <div class="mb-3 row-sm ">
          <label class="form-label text-dark ">Email</label>
          <input type="email" class="form-control text-muted shadow-none " name="Email"  value="<?php echo $row['Email_']; ?>">
        </div>
        <div class="mb-3 row-sm ">
          <label class="form-label text-dark">phone</label>
          <input type="tel" class="form-control text-muted shadow-none " name="phone"  value="<?php echo $row['Phone_']; ?>">
        </div>
        <div class="mb-3 row-sm ">
          <label class="form-label text-dark ">Enroll Number</label>
          <input type="text" class="form-control text-muted shadow-none " name="Enroll_Number" value="<?php echo $row['Enroll_Number_']; ?>">
        </div>
        <div class="mb-3 row-sm ">
          <label class="form-label text-dark">Date Of Admission</label>
          <input type="date" class="form-control text-muted shadow-none "name="DateOfAdmission"  value="<?php echo $row['Date_of_admission_']; ?>">
        </div>
        
        <button class="btn btn-info text-white w-100" name="update">update</button>
     
    
      </form>
</main>

</div>
 


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>