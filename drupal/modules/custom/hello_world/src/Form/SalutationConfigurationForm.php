<?php

namespace Drupal\hello_world\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SalutationConfigurationForm.
 */
class SalutationConfigurationForm extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['hello_world.custom_salutation'];
  }
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'salutation_configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('hello_world.custom_salutation');
    $form['salutation'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Salutation'),
      '#description' => $this->t('Please provide the salutation you want to use.'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#default_value' => $config->get('salutation'),
      
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    
    $salutation = $form_state->getValue(array('salutation'));
    $configs = $this->config('hello_world.custom_salutation')->get('salutation');
    //kint($configs);
    //$form_state->setErrorByName('salutation', 'This is ' . $salutation);
    //$salutation_length = strlen($salutation);
    //drupal_set_message($configs);
    //drupal_set_message($salutation_length);
    if(strlen($salutation ) > 64){
      $form_state->setErrorByName('salutation', 'The field is too long.');
    }

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('hello_world.custom_salutation')
      ->set('salutation', $form_state->getValue('salutation'))
      ->save();
    
  }

}
