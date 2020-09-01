<?php

namespace Drupal\hello_world;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class HelloWorldSalutation.
 */
class HelloWorldSalutation  {
	use StringTranslationTrait;
	/**
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
	protected $configFactory;

  /**
   * Constructs a new HelloWorldSalutation object.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
  	$this->configFactory = $config_factory;

  }
  public function getSalutation() {
  	$salutation = $this->configFactory ->get('hello_world.custom_salutation')->get('salutation');
  	return $salutation;
  	/*
  	$time = new \DateTime();


    if ((int) $time->format('G') >= 00 && (int) $time->format('G') < 12) {
      return $this->t('Good morning world');
    }

    if ((int) $time->format('G') >= 12 && (int) $time->format('G') < 18) {
      return $this->t('Good afternoon world');
    }

    if ((int) $time->format('G') >= 18) {
      return $this->t('Good evening world');
    }
    */
  }
}
