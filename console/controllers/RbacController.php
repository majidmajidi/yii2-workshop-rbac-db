<?php
namespace console\controllers;

use Yii;
use yii\helpers\Console;

class RbacController extends \yii\console\Controller {

  // public function actionInit(){
  //   Console::output('Yii 2 Learning.');
  // }

  public function actionInit(){

    $auth = Yii::$app->authManager;
    $auth->removeAll();
    Console::output('Removing All! RBAC.....');

    $manageUser = $auth->createRole('ManageUser');
    $manageUser->description = 'สำหรับจัดการข้อมูลผู้ใช้งาน';
    $auth->add($manageUser);

    $author = $auth->createRole('Author');
    $author->description = 'สำหรับการเขียนบทความ';
    $auth->add($author);

    $management = $auth->createRole('Management');
    $management->description = 'สำหรับจัดการข้อมูลผู้ใช้งานและบทความ';
    $auth->add($management);

    $admin = $auth->createRole('Admin');
    $admin->description = 'สำหรับการดูแลระบบ';
    $auth->add($admin);

    $auth->addChild($management, $manageUser);
    $auth->addChild($management, $author);
    $auth->addChild($admin, $management);

    $auth->assign($admin, 1);
    $auth->assign($management, 2);
    $auth->assign($author, 3);

    Console::output('Success! RBAC roles has been added.');

  }

  /*public function actionInit(){

      $auth = Yii::$app->authManager;
      $auth->removeAll();
      Console::output('Removing All! RBAC.....');

      $updateBlog = $auth->createPermission('UpdateBlog');
      $updateBlog->description = 'แก้ไขบทความ';
      $auth->add($updateBlog);

      $authorRole =  new \common\rbac\AuthorRule;
      $auth->add($authorRole);

      $updateOwnBlog = $auth->createPermission('UpdateOwnBlog');
      $updateOwnBlog->description = 'แก้ไขเฉพาะบทความของตัวเอง';
      $updateOwnBlog->ruleName = $authorRole->name;
      $auth->add($updateOwnBlog);
      $auth->addChild($updateOwnBlog,$updateBlog);

      $manageUser = $auth->createRole('ManageUser');
      $manageUser->description = 'สำหรับจัดการข้อมูลผู้ใช้งาน';
      $auth->add($manageUser);

      $author = $auth->createRole('Author');
      $author->description = 'สำหรับการเขียนบทความ';
      $auth->add($author);
      $auth->addChild($author, $updateOwnBlog);

      $editor = $auth->createRole('Editor');
      $editor->description = 'สำหรับการตรวจสอบบทความ';
      $auth->add($editor);
      $auth->addChild($editor, $author);

      $admin = $auth->createRole('Admin');
      $admin->description = 'สำหรับการดูแลระบบ';
      $auth->add($admin);

      $auth->addChild($admin, $editor);
      $auth->addChild($admin, $manageUser);

      $auth->assign($admin, 1);
      $auth->assign($editor, 2);
      $auth->assign($author, 3);
      $auth->assign($author, 4);

      Console::output('Success! RBAC roles has been added.');
  }
  */

 // public function actionInit(){
 //
 //   $auth = Yii::$app->authManager;
 //   $auth->removeAll();
 //   Console::output('Removing All! RBAC.....');
 //
 //   $createPost = $auth->createPermission('createBlog');
 //   $createPost->description = 'Create a application';
 //   $auth->add($createPost);
 //
 //   $updatePost = $auth->createPermission('updateBlog');
 //   $updatePost->description = 'Update application';
 //   $auth->add($updatePost);
 //
 //   $admin = $auth->createRole('Admin');
 //   $auth->add($admin);
 //
 //   $author = $auth->createRole('Author');
 //   $auth->add($author);
 //
 //   $management = $auth->createRole('Management');
 //   $auth->add($management);
 //
 //   $rule = new \common\rbac\AuthorRule;
 //   $auth->add($rule);
 //
 //   $updateOwnPost = $auth->createPermission('updateOwnPost');
 //   $updateOwnPost->description = 'Update Own Post';
 //   $updateOwnPost->ruleName = $rule->name;
 //   $auth->add($updateOwnPost);
 //
 //   $auth->addChild($author,$createPost);
 //   $auth->addChild($updateOwnPost, $updatePost);
 //   $auth->addChild($author, $updateOwnPost);
 //   $auth->addChild($management, $author);
 //   $auth->addChild($admin, $management);
 //
 //   $auth->assign($admin, 1);
 //   $auth->assign($management, 2);
 //   $auth->assign($author, 3);
 //   $auth->assign($author, 4);
 //
 //   Console::output('Success! RBAC roles has been added.');
 // }

}
?>
