<?php 
session_start();
if(isset($_SESSION['user_id'])){
    header('location: blog.php');
}
    require_once 'app/helpers.php';
    $page_title = 'Signup Page';
    $error = ['email' => "",
                'password' => "",
            'submit' => ""];
    $form_valid = true;


    if(isset($_POST['submit'])){
        $email = !empty($_POST['email']) ? trim($_POST['email']): "";
        $password = !empty($_POST['password']) ? trim($_POST['password']): "";
        if(!$email){
            $error['email'] = 'requir email';
            $form_valid = false;
        }
        if(!$password){
            $error['password'] = 'requir password';
            $form_valid = false;
        };
        if($form_valid){
            $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
            
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($link, $sql);
            if($result && mysqli_num_rows($result) > 0){
                $user = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header('location: blog.php');
            }else{
                $error['submit'] = '* invalid email or pasword';
            }

            
        }
    }

    ?>
<?php include 'tpl/header.php' ;?>
<main class="min-h-900">
    <div class="container">
        <section id="top-content">
            <div class='row'>
                <div class='col text-center'>
                    <h1 class='display-4'>hear you can sign in</h1>
                    <p>form blog for everybody</p>
                    <p> <a herf='singup.php' class='btn btn-outline-warning btn-lg'>open new accaunt</a></p>
                </div>
            </div>
        </section>
        <section id='main-content'>
            <div class="row">
                <div class="col mt-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti optio ut nihil officiis
                        accusantium cum architecto animi molestiae sapiente at?</p>
                </div>
            </div>
        </section>
        <section id="signin-form">
            <div class="row">
                <div class="col-lg-g mt-3">
                    <form action="" method="POST" autocomplete="off" novalidate="novalidate">
                        <div class="form-group">
                            <label for="email">* Name:</label>
                            <input value="<?=old('email');?>" type="email" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">* Email:</label>
                            <input value="<?=old('email');?>" type="email" name="email" id="email" class="form-control">
                            <span class='text-danger'><?=$error['email'];?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">* password:</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <span class='text-danger'><?=$error['password'];?></span>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Singin</button>
                        <span class='text-danger'><?=$error['submit'];?></span>
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>
<?php include 'tpl/footer.php'; ?>