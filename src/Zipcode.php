<?php
/**
 * Japan Zipcode for Ing API.
 *
 * @copyright Copyright (c) 2020 Ing, Inc. (http://in-g.jp)
 * @license MIT License
 */

namespace IngZipcode;

/**
 * Japan Zipcode for Ing API., allows access to the API from PHP.
 *
 */
class Zipcode
{

  /**
   * @var String
   */
  protected $zipcode = "";

  /**
   * Create a new API client using zipcode number.
   */
  public function __construct($zipcode)
  {
      $this->zipcode = $zipcode;
  }

  public function getData()
  {
      $zip = mb_substr($this->zipcode, 0, 3);
      $separator = DIRECTORY_SEPARATOR;
      $url = "data".$separator.$zip.$separator.$this->zipcode.".json";
      if (!file_exists(__DIR__.$separator.$url)) {
        return false;
      }
      $content = file_get_contents($url, true);
      if (count($content) <= 0) {
        return false;
      }
      return $content;
  }

}
?>
