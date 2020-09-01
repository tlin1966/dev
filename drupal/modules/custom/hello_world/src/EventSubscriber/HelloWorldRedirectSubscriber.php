<?php

namespace Drupal\hello_world\EventSubscriber;

use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
/**
 * Class HelloWorldRedirectSubscriber.
 */
class HelloWorldRedirectSubscriber implements EventSubscriberInterface{

  /**
   * Drupal\Core\Session\AccountProxyInterface definition.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   * @var Drupal\Core\Routing\CurrentRouteMatch
   */
  protected $currentUser;
  protected $currentRouteMatch;

  /**
   * Constructs a new HelloWorldRedirectSubscriber object.
   */
  public function __construct(AccountProxyInterface $current_user, CurrentRouteMatch $currentRouteMatch) {
    $this->currentUser = $current_user;
  }
  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['onRequest', 0];
    return $events;
  }
  /**
   * Handler for the kernel request event.
   *
   * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
   */
  public function onRequest(GetResponseEvent $event) {
    $request = $event->getRequest();
    $path = $request ->getPathInfo();
    $route_name = $this->currentRouteMatch->getRouteName;
    $roles = $this->currentUser->getRoles();
    if ($path != '/hello'){
      return;
    }
    if (in_array('non_grata', $roles)) {
      $url = Url::fromUri('internal:/');
      $event->setResponse(new LocalRedirectResponse($url->toString()));
    }
  }
  public function getUser(){
    $roles = $this->currentUser->getRoles();
    //kint($this->currentUser);
    return $roles;
  }

}
