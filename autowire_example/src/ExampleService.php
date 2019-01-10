<?php
/**
 * Created by PhpStorm.
 * User: yms
 * Date: 1/10/19
 * Time: 16:42
 */

namespace Drupal\autowire_example;

use Drupal\Core\Language\LanguageManagerInterface;
use \Drupal\Core\Datetime\DateFormatterInterface;

class ExampleService {

  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $language_manager;

  /**
   * The Date Formatter
   *
   * @var \Drupal\Core\Datetime\DateFormatterInterface
   */
  protected $dateService;

  /**
   * Constructs a new FancyService.
   *
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager.
   * @param \Drupal\Core\Datetime\DateFormatterInterface $dateService
   *   The Date Formatter.
   *
   */
  public function __construct(LanguageManagerInterface $language_manager, DateFormatterInterface $dateService) {
    $this->language_manager = $language_manager;
    $this->language_manager = $dateService;
  }

  /**
   * Get Date Current Language.
   *
   * @param  integer $timestamp
   *   Date in timestamp.
   * @param  string date format
   *   Date fromat in string.
   *
   * @return string
   */
  public function getTranslatedDate($timestamp, $format) {
    $lang_code = $this->language_manager->getCurrentLanguage()->getId();
    return $this->language_manager->format($timestamp, 'custom', $format, NULL, $lang_code);
  }

}