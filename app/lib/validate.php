<?php
namespace PHPMVC\LIB;

trait Validate
{

    private $_regexPatterns = [
        'num'           => '/^[0-9]+(?:\.[0-9]+)?$/',
        'int'           => '/^[0-9]+$/',
        'float'         => '/^[0-9]+\.[0-9]+$/',
        'alpha'         => '/^[a-zA-ZÜüÄäÖöß\p{Arabic} ]+$/u',
        'alphanum'      => '/^[a-zA-ZÜüÄäÖöß.!,-:?€+$@^\/\p{Arabic}0-9 ]+$/u',
        'vdate'         => '/^[1-2][0-9][0-9][0-9]-(?:(?:0[1-9])|(?:1[0-2]))-(?:(?:0[1-9])|(?:(?:1|2)[0-9])|(?:3[0-1]))$/',
        'email'         => '/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/',
        'url'           => '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
    ];

    public function req ($value)
    {
        return '' != $value || !empty($value);
    }

    public function num($value)
    {
        return (bool) preg_match($this->_regexPatterns['num'], $value);
    }

    public function int($value)
    {
        return (bool) preg_match($this->_regexPatterns['int'], $value);
    }

    public function float($value)
    {
        return (bool) preg_match($this->_regexPatterns['float'], $value);
    }

    public function alpha($value)
    {
        return (bool) preg_match($this->_regexPatterns['alpha'], $value);
    }

    public function alphanum($value)
    {
        return (bool) preg_match($this->_regexPatterns['alphanum'], $value);
    }

    public function eq($value, $matchAgainst)
    {
        return $value == $matchAgainst;
    }

    public function eq_field($value, $otherFieldValue)
    {
       return $value == $otherFieldValue;
    }

    public function lt($value, $matchAgainst)
    {
        if(is_string($value)) {
            return mb_strlen($value) < $matchAgainst;
        } elseif (is_numeric($value)) {
            return $value < $matchAgainst;
        }
    }

    public function gt($value, $matchAgainst)
    {
        if(is_string($value)) {
            return mb_strlen($value) > $matchAgainst;
        } elseif (is_numeric($value)) {
            return $value > $matchAgainst;
        }
    }

    public function min($value, $min)
    {
        if(is_string($value)) {
            return mb_strlen($value) >= $min;
        } elseif (is_numeric($value)) {
            return $value >= $min;
        }
    }

    public function max($value, $max)
    {
        if(is_string($value)) {
            return mb_strlen($value) <= $max;
        } elseif (is_numeric($value)) {
            return $value <= $max;
        }
    }

    public function between($value, $min, $max)
    {
        if(is_string($value)) {
            return mb_strlen($value) >= $min && mb_strlen($value) <= $max;
        } elseif (is_numeric($value)) {
            return $value >= $min && $value <= $max;
        }
    }

    public function floatlike($value, $beforeDP, $afterDP)
    {
        if(!$this->float($value))
        {
            return false;
        }
        $pattern = '/^[0-9]{' . $beforeDP . '}\.[0-9]{' . $afterDP . '}$/';
        return (bool) preg_match($pattern, $value);
    }

    public function vdate($value)
    {
        return (bool) preg_match($this->_regexPatterns['vdate'], $value);
    }

    public function email($value)
    {
        return (bool) preg_match($this->_regexPatterns['email'], $value);
    }

    public function url($value)
    {
        return (bool) preg_match($this->_regexPatterns['url'], $value);
    }

    public function selectbox ($value)
    {
        if ($value == 'Choose...') {
          return 'Choose...' != $value;
        }elseif ($value == 'Wählen...') {
          return  'Wählen...' != $value ;
        }
        elseif ($value == 'يرجى اختيار...') {
          return  'يرجى اختيار...' != $value ;
        }
    }

    public function isValid($roles, $inputType)
    {
      $errors = [];
      if (!empty($roles)) {
        foreach ($roles as $fieldName => $validationRoles) {
          $niceName     = $validationRoles[0];
          $validateRole = $validationRoles[1];
          //assign input value to ariable
          $value = $inputType[$fieldName];
          $validateRole = explode('|' , $validateRole );
          $firstReg = $validateRole[0];
          // This Foreach Jsut will be check if the first validatekay id req or not
          if ($firstReg == 'req') {
            foreach ($validateRole as $validateKay ) {
              if(array_key_exists($fieldName, $errors))
              continue;
              //Perg Match For min Kay
              if(preg_match_all('/(min)\((\d+)\)/', $validateKay, $m)) {
                if($this->min($value, $m[2][0]) === false) {
                  $this->messenger->add(
                    $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0]]),
                    Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                  );
                }
              }
              //Perg Match For max Kay
              elseif(preg_match_all('/(max)\((\d+)\)/', $validateKay, $m)) {
                if($this->max($value, $m[2][0]) === false) {
                  $this->messenger->add(
                    $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0]]),
                    Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                  );
                }
              }
              //Perg Match For lt Kay
              elseif(preg_match_all('/(lt)\((\d+)\)/', $validateKay, $m)) {
                if($this->lt($value, $m[2][0]) === false) {
                    $this->messenger->add(
                        $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0]]),
                        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                    );
                    $errors[$fieldName] = true;
                }
              }
              //Perg Match For gt Kay
              elseif(preg_match_all('/(gt)\((\d+)\)/', $validateKay, $m)) {
                if($this->gt($value, $m[2][0]) === false) {
                    $this->messenger->add(
                        $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0]]),
                        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                    );
                    $errors[$fieldName] = true;
                }
              }
              //Perg Match For between Kay
              elseif(preg_match_all('/(between)\((\d+),(\d+)\)/', $validateKay, $m)) {
                if($this->between($value, $m[2][0], $m[3][0]) === false) {
                    $this->messenger->add(
                        $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0], $m[3][0]]),
                        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                    );
                    $errors[$fieldName] = true;
                }
              }
              //Perg Match For floatlike Kay
              elseif(preg_match_all('/(floatlike)\((\d+),(\d+)\)/', $validateKay, $m)) {
                if($this->floatlike($value, $m[2][0], $m[3][0]) === false) {
                    $this->messenger->add(
                        $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0], $m[3][0]]),
                        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                    );
                    $errors[$fieldName] = true;
                }
              }
              //Perg Match For eq Kay
              elseif(preg_match_all('/(eq)\((\w+)\)/', $validateKay, $m)) {
                if($this->eq($value, $m[2][0]) === false) {
                    $this->messenger->add(
                        $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0]]),
                        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                    );
                    $errors[$fieldName] = true;
                }
              }
              //Perg Match For eq_field Kay
              elseif(preg_match_all('/(eq_field)\((\w+)\)/', $validateKay, $m)) {
                  $otherFieldValue = $inputType[$m[2][0]];
                  if($this->eq_field($value, $otherFieldValue) === false) {
                      $this->messenger->add(
                          $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $this->language->get('lang_labels_'.$m[2][0])]),
                          Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                      );
                      $errors[$fieldName] = true;
                  }
                }
              //Perg Match For eq_field Kay
              else {
                  if($this->$validateKay($value) === false) {
                      $this->messenger->add(
                          $this->language->feedKey('lang_error_'.$validateKay, [$this->language->get('lang_labels_'.$fieldName)]),
                          Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                      );
                      $errors[$fieldName] = true;
                  }
              }
            }
          }elseif ($firstReg !== 'req' && !empty($value) ) {
            foreach ($validateRole as $validateKay ) {
              if(array_key_exists($fieldName, $errors))
              continue;
              //Perg Match For min Kay
              if(preg_match_all('/(min)\((\d+)\)/', $validateKay, $m)) {
                if($this->min($value, $m[2][0]) === false) {
                  $this->messenger->add(
                    $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0]]),
                    Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                  );
                }
              }
              //Perg Match For max Kay
              elseif(preg_match_all('/(max)\((\d+)\)/', $validateKay, $m)) {
                if($this->max($value, $m[2][0]) === false) {
                  $this->messenger->add(
                    $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0]]),
                    Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                  );
                }
              }
              //Perg Match For lt Kay
              elseif(preg_match_all('/(lt)\((\d+)\)/', $validateKay, $m)) {
                if($this->lt($value, $m[2][0]) === false) {
                    $this->messenger->add(
                        $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0]]),
                        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                    );
                    $errors[$fieldName] = true;
                }
              }
              //Perg Match For gt Kay
              elseif(preg_match_all('/(gt)\((\d+)\)/', $validateKay, $m)) {
                if($this->gt($value, $m[2][0]) === false) {
                    $this->messenger->add(
                        $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0]]),
                        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                    );
                    $errors[$fieldName] = true;
                }
              }
              //Perg Match For between Kay
              elseif(preg_match_all('/(between)\((\d+),(\d+)\)/', $validateKay, $m)) {
                if($this->between($value, $m[2][0], $m[3][0]) === false) {
                    $this->messenger->add(
                        $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0], $m[3][0]]),
                        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                    );
                    $errors[$fieldName] = true;
                }
              }
              //Perg Match For floatlike Kay
              elseif(preg_match_all('/(floatlike)\((\d+),(\d+)\)/', $validateKay, $m)) {
                if($this->floatlike($value, $m[2][0], $m[3][0]) === false) {
                    $this->messenger->add(
                        $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0], $m[3][0]]),
                        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                    );
                    $errors[$fieldName] = true;
                }
              }
              //Perg Match For eq Kay
              elseif(preg_match_all('/(eq)\((\w+)\)/', $validateKay, $m)) {
                if($this->eq($value, $m[2][0]) === false) {
                    $this->messenger->add(
                        $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $m[2][0]]),
                        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                    );
                    $errors[$fieldName] = true;
                }
              }
              //Perg Match For eq_field Kay
              elseif(preg_match_all('/(eq_field)\((\w+)\)/', $validateKay, $m)) {
                  $otherFieldValue = $inputType[$m[2][0]];
                  if($this->eq_field($value, $otherFieldValue) === false) {
                      $this->messenger->add(
                          $this->language->feedKey('lang_error_'.$m[1][0], [$this->language->get('lang_labels_'.$fieldName), $this->language->get('lang_labels_'.$m[2][0])]),
                          Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                      );
                      $errors[$fieldName] = true;
                  }
                }
              //Perg Match For eq_field Kay
              else {
                  if($this->$validateKay($value) === false) {
                      $this->messenger->add(
                          $this->language->feedKey('lang_error_'.$validateKay, [$this->language->get('lang_labels_'.$fieldName)]),
                          Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
                      );
                      $errors[$fieldName] = true;
                  }
              }
            }
          }
        }
      }
      return empty($errors) ? true : false;

    }

}
