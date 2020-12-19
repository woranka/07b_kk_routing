<?php
// W skrypcie definicji kontrolera nie trzeba dołączać już niczego.
// Kontroler wskazuje tylko za pomocą 'use' te klasy z których jawnie korzysta
// (gdy korzysta niejawnie to nie musi - np używa obiektu zwracanego przez funkcję)

// Zarejestrowany autoloader klas załaduje odpowiedni plik automatycznie w momencie, gdy skrypt będzie go chciał użyć.
// Jeśli nie wskaże się klasy za pomocą 'use', to PHP będzie zakładać, iż klasa znajduje się w bieżącej
// przestrzeni nazw - tutaj jest to przestrzeń 'app\controllers'.

namespace app\controllers;

//zamieniamy 'require' na 'use' wskazując jedynie przestrzeń nazw, w której znajduje się klasa
use app\forms\CalcForm;
use app\transfer\CalcResult;

/** 
 * Kontroler kalkulatora
 */
class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $hide_intro; //zmienna informująca o tym czy schować intro

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->hide_intro = false;
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
                $this->form->kwota = getFromRequest('kw');
                $this->form->okres = getFromRequest('ok');
                $this->form->oprocentowanie = getFromRequest('op');
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
                // sprawdzenie, czy parametry zostały przekazane
                if (! (isset ( $this->form->kwota ) && isset ( $this->form->okres ) && isset ( $this->form->oprocentowanie ))) {
                        // sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
                    return false; //zakończ walidację z błędem
                }

                // sprawdzenie, czy potrzebne wartości zostały przekazane
                if ($this->form->kwota == "") {
                    getMessages()->addError('Nie podano kwoty kredytu.');
                }
                if ($this->form->okres == "") {
                    getMessages()->addError('Nie podano okresu.');
                }
                if ($this->form->oprocentowanie == "") {
                    getMessages()->addError('Nie podano oprocentowania.');
                }

                // nie ma sensu walidować dalej gdy brak parametrów
                if (!getMessages()->isError()) {
                    if (! is_numeric ( $this->form->kwota )) {
                        getMessages()->addError('Kwota nie jest liczbą.');
                    }
                    if (! is_numeric ( $this->form->okres )) {
                        getMessages()->addError('Okres nie jest liczbą.');
                    }
                    if (! is_numeric ( $this->form->oprocentowanie )) {
                        getMessages()->addError('Oprocentowanie nie jest liczbą.');
                    }
                }

                return !getMessages()->isError();
	}
	
        /** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function action_calcCompute(){

		$this->getparams();
		
		if ($this->validate()) {
				
                    $this->form->kwota = floatval($this->form->kwota);
                    $this->form->okres = intval($this->form->okres);
                    $this->form->oprocentowanie = floatval($this->form->oprocentowanie);
                    
                    getMessages()->addInfo('Parametry poprawne.');

                    $this->result->result = floatval($this->form->kwota/($this->form->okres*12))+(($this->form->kwota/($this->form->okres*12))*($this->form->oprocentowanie/100));

                    getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
        
        public function action_calcShow(){
        getMessages()->addInfo('Witaj w kalkulatorze');
        $this->generateView();
	}
	
        /**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		
                getSmarty()->assign('user',unserialize($_SESSION['user']));
		
                getSmarty()->assign('action', 'OBLICZ RATĘ');
                getSmarty()->assign('page_title','Kalkulator Kredytowy');
                getSmarty()->assign('button','Oblicz ratę');
		getSmarty()->assign('page_header','Ochrona zasobów i role');
				
		getSmarty()->assign('hide_intro',$this->hide_intro);
		
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
	}
}
