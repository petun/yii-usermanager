yii-usermanager
===============
** composer.json **

```javascript
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/petun/yii-usermanager.git"
        },
    ],
    "require": {
        "petun/yii-usermanager": "dev-master",
```


** web.php **
```php
'modules' => array(
		'user' => array(
			'class' => 'vendor.petun.yii-usermanager.UserModule',
			//'profileModel' => 'Profile',
			//'useProfile' => true,
			'profileForm' => 'application.views.profile._userForm',
			'profileView' => false, // устарело
			'eventOnUserCreate' => array('Notifier', 'newUser'), // для уведомлений о новой учетной записи.
		),
```		


Пример **_userForm**

```php
<?php echo $form->dropDownListControlGroup($model->profile, 'userRoleId', DataList::items('delivery_methods')); ?>
<?php echo $form->textFieldControlGroup($model->profile,'email',array('span'=>5,'maxlength'=>45)); ?>

```


Пример **eventOnUserCreate** на классе **Notifier**
```php
class Notifier extends CComponent {

	public function init() {

	}

	public static function newUser($event){
		$user = $event->sender;

		self::initMail();


		app()->mailer->AddAddress($user->profile->email);
		app()->mailer->Subject = "Для вас создана учетная запись";
		app()->mailer->getView('newUser', array('user'=>$user),null);
		app()->mailer->Send();
	}

	public static function initMail() {
		app()->mailer->ClearAddresses();
		app()->mailer->ClearCCs();
		app()->mailer->ClearBCCs();
		app()->mailer->ClearReplyTos();
		app()->mailer->ClearAllRecipients();
		app()->mailer->ClearAttachments();
		app()->mailer->ClearCustomHeaders();

		app()->mailer->From = "from@example.com";
		app()->mailer->FromName = "Mailer";
		app()->mailer->WordWrap = 50;                                 // set word wrap to 50 characters
		app()->mailer->IsHTML(true);
		app()->mailer->CharSet = 'UTF-8';
	}

}
```