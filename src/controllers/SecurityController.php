<?php

namespace App\Controller;

use App\Core\AbstractController;

use App\Core\Validator;
use App\Service\SecurityService;


class SecurityController extends AbstractController{

    private SecurityService $securityService;
    private Validator $validator;

    public function __construct(){
        $this->layout = 'security';
        $this->securityService = new SecurityService();
        $this->validator = Validator::getInstance();
    }
    public function index(){
        $errors = $this->validator->getErrors();
        $this->render("login/login.php", ["errors" => $errors]);
    }
    public function show(){}
    public function create(){
    }

   public function store(){
    }

    public function edit(){
    }

    public function destroy(){}

    public function login(){
        $login = $_POST['email'];
        
        $password = $_POST['password'];

        $this->validator->isEmpty('email', $login);
        $this->validator->isEmpty('password', $password);


        $validatorForm = $this->validator->isValid();
        $user = $this->securityService->seConnecter($login, $password);  
        if($user !== null && $validatorForm){
        header("Location: http://localhost:8085/lister");
        }else{
            $errors  = $this->validator->getErrors();
            $this->render("login/login.php", ["errors" => $errors]);
        }


    }

    public function logout(){
        
        header("Location: http://localhost:8085/");
    }
    

   
    
}