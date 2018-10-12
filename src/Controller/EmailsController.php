<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Mailer\Email;

class EmailsController extends AppController{
    public function index(){
        $email = new Email('default');
        $email->to('darkwizarer@gmail.com')->subject('About')->send('My message');
    }
}
?>