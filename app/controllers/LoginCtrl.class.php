<?php

namespace app\controllers;

use app\transfer\User;
use app\forms\LoginForm;

class LoginCtrl{
	
        private $form;
	private $hide_intro; //zmienna informująca o tym czy schować intro
        
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new LoginForm();
                $this->hide_intro = false;
	}
	
	public function getParams(){
		// 1. pobranie parametrów
		$this->form->login = getFromRequest('login');
		$this->form->pass = getFromRequest('pass');
	}
	
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->login ) && isset ( $this->form->pass ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false;
		}
			
			// nie ma sensu walidować dalej, gdy brak parametrów
		if (! getMessages()->isError ()) {
			
			// sprawdzenie, czy potrzebne wartości zostały przekazane
			if ($this->form->login == "") {
				getMessages()->addError ( 'Nie podano loginu' );
			}
			if ($this->form->pass == "") {
				getMessages()->addError ( 'Nie podano hasła' );
			}
		}

		//nie ma sensu walidować dalej, gdy brak wartości
		if ( !getMessages()->isError() ) {
		
			// sprawdzenie, czy dane logowania poprawne
			// (takie informacje najczęściej przechowuje się w bazie danych)
			if ($this->form->login == "admin" && $this->form->pass == "admin") {

				//sesja już rozpoczęta w init.php, więc działamy ...
				$user = new User($this->form->login, 'admin');
				// zaipsz obiekt użytkownika w sesji
				$_SESSION['user'] = serialize($user);
				// dodaj rolę użytkownikowi (jak wiemy, zapisane też w sesji)
				addRole($user->role);

			} else if ($this->form->login == "user" && $this->form->pass == "user") {

				//sesja już rozpoczęta w init.php, więc działamy ...
				$user = new User($this->form->login, 'user');
				// zaipsz obiekt użytkownika w sesji
				$_SESSION['user'] = serialize($user);
				// dodaj rolę użytkownikowi (jak wiemy, zapisane też w sesji)
				addRole($user->role);

			} else {
				getMessages()->addError('Niepoprawny login lub hasło');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	public function action_login(){

		$this->getParams();
		
		if ($this->validate()){
			//zalogowany => przekieruj na stronę główną, gdzie uruchomiona zostanie domyślna akcja
			header("Location: ".getConf()->app_url."/");
		} else {
			//niezalogowany => wyświetl stronę logowania
			$this->generateView(); 
		}
		
	}
	
	public function action_logout(){
		// 1. zakończenie sesji - tylko kończymy, jesteśmy już podłączeni w init.php
		session_destroy();
		
		// 2. wyświetl stronę logowania z informacją
		getMessages()->addInfo('Poprawnie wylogowano z systemu');

		$this->generateView();		 
	}
	
	public function generateView(){
                
                getSmarty()->assign('action','ZALOGUJ SIĘ');
		getSmarty()->assign('page_title','Strona logowania');
                getSmarty()->assign('button','Zaloguj się');
		getSmarty()->assign('form',$this->form);
                getSmarty()->assign('hide_intro',$this->hide_intro);
		getSmarty()->display('LoginView.tpl');		
	}
}