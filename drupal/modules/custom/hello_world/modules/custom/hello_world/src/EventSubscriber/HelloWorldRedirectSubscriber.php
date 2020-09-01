<?php

namespace Drupal\hello_world\EventSubscriber;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
/**
 * Class HelloWorldRedirectSubscriber.
 */
class HelloWorldRedirectSubscriber {

  /**
   * Drupal\Core\Session\AccountProxyInterface definition.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * Constructs a new HelloWorldRedirectSubscriber object.
   */
  public function __construct(AccountProxyInterface $current_user) {
    $this->currentUser = $current_user;
    kint($currentUser);
  }

}
