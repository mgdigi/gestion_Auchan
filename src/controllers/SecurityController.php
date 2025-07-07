<?php

namespace App\Controller;

use App\Core\AbstractController;


use App\Core\Validator;
use App\Service\SecurityService;


class SecurityController extends AbstractController{

    private SecurityService $securityService;
    private Validator $validator;


    public function __construct(){
        parent::__construct();
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

    // public function destroy(){}

    public function login(){

        $login = $_POST['email'];
        $password = $_POST['password'];

        $this->validator->isEmpty('email', $login);
        $this->validator->isEmpty('password', $password);
        $this->validator->minLength('email', $login, 4, "L'email doit contenir au moins 4 caractères");
        $this->validator->minLength('password', $password, 4, "Le mot de passe doit contenir au moins 4 caractères");
        $this->validator->isEmail('email', $login);
       

        $validatorForm = $this->validator->isValid();
        if($validatorForm){
        $user = $this->securityService->seConnecter($login, $password);  
         if($user){
             $this->session->set("user", $user->toArray());
            header("Location:". $_ENV['APP_URL']. "/lister");
            exit();
         }else{
            $this->validator->addError('password', "Identifiant incorrect");
            $this->session->set('errors', $this->validator->getErrors());
            $this->render("login/login.php");
         }
        }else{
         $this->session->set('errors', $this->validator->getErrors());
        $this->render("login/login.php");
        }
    }

    public function logout(){
        self::destroy();
        header("Location:". $_ENV['APP_URL']);
    }
    

   
    
}