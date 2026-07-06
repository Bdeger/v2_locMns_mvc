<?php 
// app/Controllers/Controller.php

abstract class Controller{
    public function __construct(
        protected View $view = new View()
    ){
        // constructor Property Promotion
    }
}