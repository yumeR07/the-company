<?php
    require_once "Database.php";

    class User extends Database{
        # REGISTER
        public function store($request){
            #Receive the data
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            $password = $request['password'];

            #hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            # Create query string
            $sql = "INSERT INTO users(first_name, last_name, username, db_password) VALUES('$first_name', '$last_name', '$username', '$hashed_password')";

            # Excute the query string
            if($this->conn->query($sql)){
                header("location: ../views"); //index.php
                exit; //same as die
            } else{
                die("Error in creating user " . $this->conn->error);
            }
        }

        # LOGIN
        public function login($request){
            $username = $request['username'];
            $password = $request['password'];

            # Create a query string
            $sql = "SELECT * FROM users WHERE username = '$username'";

            # Execute the query
            $result = $this->conn->query($sql);

            # Check for the username
            if($result->num_rows == 1){
                # Check for the password
                $user = $result->fetch_assoc();
                //$user = ['id'=>1,'first_name'=>'Mary','last_name'=>'Watson','username'=>'marywatson',db_password....]

                if(password_verify($password, $user['db_password'])){
                    #If the password is matches, then create a SESSION VARIABLES for furture use
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullname'] = $user['first_name'] . " " . $user['last_name'];

                    header("location: ../views/dashboard.php");
                    exit;
                } else{
                    die("Password is incorrect.");
                }
            }else{
                die("Username not found.");
            }
        }
        
        # LOGOUT
        public function logout(){
            session_start();
            session_unset();
            session_destroy();

            header("location: ../views");  //login page
            exit;
        }

        # retrieved all users in the database
        public function getAllUsers(){
            $sql = "SELECT id, first_name, last_name, username, photo FROM users";
            if($result = $this->conn->query($sql)){
                return $result;
            } else{
                die("Error in retriering the users" . $this->conn->error);
            }
        }

        #Who is login 
        public function getUser(){
            // session_start(); use only one , on the same page
            $id = $_SESSION['id'];

            # Query string
            $sql = "SELECT first_name, last_name, username, photo FROM users WHERE id='$id'";
            
            if($result = $this->conn->query($sql)){
                return $result->fetch_assoc();
            }else{
                die("Error retrieving the user " . $this->conn->error);
            }
        }

        #edit-user-action
        public function update($request, $files){
            session_start();
            $id           = $_SESSION['id'];
            $first_name   = $request['first_name'];
            $last_name    = $request['last_name'];
            $username     = $request['username'];
            $photo        = $files['photo']['name'];
            $tmp_photo    = $files['photo']['tmp_name'];

            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = '$id'";

            #Execute the query 
            if($this->conn->query($sql)){
                $_SESSION['username'] = $username;
                $_SESSION['fullname'] = "$first_name $last_name";

                # If there is an uploaded photo, save it ti the DB and save the file to 
            # images filder
                if($photo){ 
                    # create a query string
                    $sql = "UPDATE users SET photo = '$photo' WHERE id = '$id'";
                    $destination = "../assets/images/$photo";

                    # Save the image name to the DB
                    if($this->conn->query($sql)){
                        # Save the image to the folder
                        if(move_uploaded_file($tmp_photo, $destination)){
                            header('location:  ../views/dashboard.php');
                            exit;
                        } else{
                            die("Error in moving the file.");
                        } 
                    } else{
                        die("Error uploading the photo");
                    }
                }

                header("location:  ../views/dashboard.php");
                exit;
            }  else{
                die("Error in updateing the user " . $this->conn->error);
            }        
        }

        public function delete(){
            session_start();
            $id = $_SESSION['id'];

            $sql = "DELETE FROM users WHERE id = '$id'";

            if($this->conn->query($sql)){
                $this->logout();
            } else{
                die("Error in deleting the account " . $this->conn->error);
            }
        }
    }
?>