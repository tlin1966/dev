<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\hello_world\EventSubscriber\HelloWorldRedirectSubscriber;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HelloWorldController.
 */
class ServiceTest extends ControllerBase {
   /**
   * @var \Drupal\hello_world\EventSubscriber\HelloWorldRedirectSubscriber
   */
  protected $redirect;

  /**
   * HelloWorldController constructor.
   *
   * @param \Drupal\hello_world\EventSubscriber\HelloWorldRedirectSubscriber
   */
  public function __construct(HelloWorldRedirectSubscriber $redirect) {
    $this->redirect = $redirect;
  }

/**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('hello_world.redirect_subscriber')
    );
  }

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello() {
    return [
      '#type' => 'markup',
      '#markup' => $this->redirect->getUser()
    ];
  }
  
}
