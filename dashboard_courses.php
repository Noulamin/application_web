<?php
    session_start();

    if(!isset($_SESSION["user_name"]))
    {
      header("location: index.php");
    }
?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard_student.css">
    <title>dashboard courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3a3f417346.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.staticaly.com/gh/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <main>
        <section class="left_side_bare">
            <p class="e-class-logo">
                E-classe
            </p>
            <img src="images/youcode.png" alt="youcode">
            <p class="name">
                <?php
                    echo $_SESSION["user_name"];
                ?>
            </p>
            <p class="role">
                Admin
            </p>
            <div class="buttons">
              <form action="dashboard.php">
                <button class="bu">
                  <div class="center">
                      <i class="fas fa-home"></i>
                  </div>
                  <div class="center0">
                      Home
                  </div>
              </button>
              </form>
                <button class="bu0">
                    <div class="center">
                        <i class="far fa-bookmark"></i>
                    </div>
                    <div class="center0">
                        Courses
                    </div>
                </button>
                <form action="dashboard_student.php">
                <button class="bu">
                    <div class="center">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="center0">
                        Students
                    </div>
                </button>
                </form>
                <form action="dashboard_payment.php">
                  <button class="bu">
                    <div class="center">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="center0">
                        Payment
                    </div>
                </button>
                </form>
                <button class="bu">
                    <div class="center">
                        <img class="icons" src="images/report.png" alt="">
                    </div>
                    <div class="center0">
                        Report
                    </div>
                </button>
                <button class="bu">
                    <div class="center">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                    <div class="center0">
                        Settings
                    </div>
                </button>
            </div>
            <div class="sign_out">
              <form method="post" action="connect.php">
                <button class="logout" name="log_out">
                  <div class="center0">
                      logout
                  </div>
                  <div class="center">
                      <i class="fas fa-sign-out-alt"></i>
                  </div>
                 </button>
              </form>
            </div>
        </section>
        <section class="right_side_bare">
            <header>
                <img src="images/notification.png" alt="">
                <input type="text" placeholder="Search ...">
            </header>
            <div class="divs">
                <div class="divs1">
                    <p class="p1">
                        Students List
                    </p>
                    <button class="bu2" onclick="open_form()">
                        ADD NEW COURSE
                    </button>
                </div>
                <div class="divs2">
                            <table class="table">
                              <thead>
                                <tr class="text-secondary">
                                  <th scope="col">Course name</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">buy now</th>
                                  <th scope="col">Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "e_class_users";
                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    $data_ = $conn -> query("SELECT * FROM students;");

                                    foreach($data_ as $data) :
                                ?>
                                  <tr class="bg-white mb-3 align-middle border-5 border-light">
                                    <th scope="row">
                                      <img src="./images/img_table.png" alt="img_table" />
                                    </th>
                                    <td><?php echo $data['Name_'] ?></td>
                                    <td><?php echo $data['Email_'] ?></td>
                                    <td><?php echo $data['Phone_'] ?></td>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                </div>
            </div>
        </section>
        
        <div class="form_back" id="form_back">
            
        </div>
        <div class="form_back_" id="form_back_">
            <form method="post" action="connect.php">
                <div class="form">
                    <button class="x_bu" onclick="close_form()">
                        X
                    </button>
                    <p class="p_input">Name</p>
                    <input class="inp" type="text" name="inp_name">
                    <p class="p_input">Email</p>
                    <input class="inp" type="text" name="inp_email">
                    <p class="p_input">Phone</p>
                    <input class="inp" type="text" name="inp_phone">
                    <p class="p_input">Enroll Number</p>
                    <input class="inp" type="text" name="inp_enroll">
                    <p class="p_input">Date of admission</p>
                    <input class="inp" type="date" name="inp_date">
        
                    <input type="submit" class="save_bu" value="Save" name="bu_student_save">
                    
                </div>
            </form>
        </div>
    </main>
    <script src="javascript.js">

    </script>
</body>
</html>