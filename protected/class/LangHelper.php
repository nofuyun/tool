<?php
Doo::loadClass ( "CookieHelper" );

class LangHelper {
	/***
	 *Todo set  Lang
	 * */
	public function setLang() {
		$lang = $this->getLangByRequestURI ();
		if (empty ( $lang )) {
			Doo::conf ()->LANG = (! empty ( $_COOKIE ['lang'] ) ? $_COOKIE ['lang'] : Doo::conf ()->LANG);
			CookieHelper::setCookie ( 'lang', Doo::conf ()->LANG );
		} else {
			Doo::conf ()->LANG = $lang;
			CookieHelper::setCookie ( 'lang', Doo::conf ()->LANG );
		}
	}
	
	/***
	 * Todo get Lang
	 * */
	public function getLang() {
		return Doo::conf ()->LANG;
	}
	/***
	 * Todo get Lang By Request URI
	 * */
	public function getLangByRequestURI() {
		$search = implode ( '|', Doo::conf ()->LANGS );
		preg_match ( '/(' . $search . ')\//', $_SERVER ["REQUEST_URI"], $matches );
		if (empty ( $matches )) {
			return '';
		} else {
			return $matches [1];
		}
	}

}