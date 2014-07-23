<?
class UserModule extends CWebModule {

	public $defaultLayout = 'application.views.layouts.column2';

	public $defaultController = 'user';

	public $profileModel;

	public $profileForm;

	public $profileView;

	public $eventOnUserCreate;


	public function init() {

	}



	/**
	 * The pre-filter for controller actions.
	 * @param CController $controller the controller.
	 * @param CAction $action the action.
	 * @return boolean whether the action should be executed.
	 * @throws CException|CHttpException if user is denied access.
	 */
	public function beforeControllerAction($controller, $action)
	{
		if (parent::beforeControllerAction($controller, $action)) {
			$user = Yii::app()->getUser();

			if ($user instanceof AuthWebUser) {
				if ($user->isAdmin) {
					return true;
				} elseif ($user->isGuest) {
					$user->loginRequired();
				}
			} else {
				throw new CException('WebUser component is not an instance of AuthWebUser.');
			}
		}
		throw new CHttpException(401, Yii::t('AuthModule.main', 'Access denied.'));
	}


}