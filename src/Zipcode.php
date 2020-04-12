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
      $url = "./data/".$zip."/".$this->zipcode.".json";
      $content = file_get_contents($url, true);
      if ($content = null || $content = "") {
        $err = array(
          "result" => false,
          "code" => 404,
          "message" => "Zipcode Not found"
        );
        return json_encode($err);
      }
      return $content;
  }

}
?>
