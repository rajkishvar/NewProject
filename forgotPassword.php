<?php 


?>

<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
    <section>
       <div class="container mt-5 pt-5">
        <div class="row">
          <div class="col-12 col-sm-7 col-md-6 m-auto">
            <div class="card border-0 shadow">
              <div class="card-body">
                <svg class="mx-auto my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                    <h5 class="font-weight-bold">Forgot Password</h5>
                    <form method="post" action="Backend/verifyAccount.php" name="signin-form">
                    <input type="text" name="studentID" id="studentID" class="form-control my-4 py-2" placeholder="Enter Student ID" />
                    <div class="text-center mt-3">
                        <button class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </body>
    
</html>