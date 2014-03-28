<?php

class UserController extends GxController {

  public function actionView($id) {
    $this->render('view', array(
      'model' => $this->loadModel($id, 'User'),
    ));
  }

  public function actionCreate() {
    if (Yii::app()->user->isGuest) {
      $model = new User;

      if (isset($_POST['User'])) {
        $model->setAttributes($_POST['User']);

        if ($model->save()) {
          $identity = new UserIdentity($model->name, $model->password);
          if ($identity->authenticate())
            Yii::app()->user->login($identity);
          if (Yii::app()->getRequest()->getIsAjaxRequest())
            Yii::app()->end();
          else
            $this->redirect('index');
        }
      }

      $this->render('create', array('model' => $model));
    }else {
      $this->redirect('/');
    }
  }

  public function actionUpdate($id) {
    $model = $this->loadModel($id, 'User');


    if (isset($_POST['User'])) {
      $model->setAttributes($_POST['User']);

      if ($model->save()) {
        $this->redirect(array('view', 'id' => $model->id));
      }
    }

    $this->render('update', array(
      'model' => $model,
    ));
  }

  public function actionDelete($id) {
    if (Yii::app()->getRequest()->getIsPostRequest()) {
      $this->loadModel($id, 'User')->delete();

      if (!Yii::app()->getRequest()->getIsAjaxRequest())
        $this->redirect(array('admin'));
    } else
      throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
  }

  public function actionIndex() {
    $dataProvider = new CActiveDataProvider('User');
    $this->render('index', array(
      'dataProvider' => $dataProvider,
    ));
  }

  public function actionAdmin() {
    $model = new User('search');
    $model->unsetAttributes();

    if (isset($_GET['User']))
      $model->setAttributes($_GET['User']);

    $this->render('admin', array(
      'model' => $model,
    ));
  }

  /**
   * Displays the login page
   */
  public function actionLogin() {
    $model = new LoginForm;

    // if it is ajax validation request
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }

    // collect user input data
    if (isset($_POST['LoginForm'])) {
      $model->attributes = $_POST['LoginForm'];
      // validate user input and redirect to the previous page if valid
      if ($model->validate() && $model->login())
        $this->redirect(Yii::app()->user->returnUrl);
    }
    // display the login form
    $this->render('login', array('model' => $model));
  }

  /**
   * Logs out the current user and redirect to homepage.
   */
  public function actionLogout() {
    Yii::app()->user->logout();
    $this->redirect(Yii::app()->homeUrl);
  }

}
