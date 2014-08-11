<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Caleb Schools',
    //'theme'=>'bootstrap2',
    //Available layouts for Bootstrap v2.3.2 :starter,hero,fluid,carousel,justified-nav,marketing-narrow. (uncomment 'theme'=>'bootstrap2' to use these).
    // Available layouts for Bootstrap v3.0.0 :starter-template,offcanvas,carousel,justified-nav,jumbotron,jumbotron-narrow.
    'layout' => 'carousel',

    // preloading 'log' component
    'preload' => array(
        'log',
        'input', //Filter
        //'bootstrap', // preload the bootstrap component,comment this out if you don't use bootstrap2 theme.
        //(Yiistrap and YiiWheels work with bootstrap 2).
    ),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.bootstrap.components.*',
        'application.extensions.bootstrap.helpers.TbHtml',
         'application.modules.rights.*',
         'application.modules.rights.components.*',
        //DEBUGGING STUFF
        'application.vendors.FirePHPCore.FirePHP',
        'application.vendors.FirePHPCore.FB',
    ),
    'aliases' => array(
        //yiistrap
        'bootstrap' => realpath(__DIR__ . DS.'..'.DS.'extensions'.DS.'bootstrap'),
        // yiiwheels configuration
        'yiiwheels' => 'webroot.protected.extensions.yiiwheels'
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'centangle',
            'generatorPaths' => array(
                'bootstrap.gii'
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
           'message' => array(
            'userModel' => 'User',
            'getNameMethod' => 'getFullName',
            'getSuggestMethod' => 'getSuggest',
             'viewPath' => '//messagesModuleCustom',
        ),
              'rights'=>array(
                'install'=>false,
                 
               
        ),

    ),

    // application components
    'components' => array(
        'user' => array(
              
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class'=>'RWebUser',
        ),
        //email
        'mailer' => array(
            'class' => 'application.extensions.mailer.EMailer',
        ),

        //filter,security
        'input' => array(
            'class' => 'CmsInput',
            'cleanPost' => true,
            'cleanGet' => true,
            'cleanMethod' => 'stripClean'
        ),
        // yiistrap configuration
        'bootstrap' => array(
            'class' => 'bootstrap.components.KTbApi',
        ),
        // yiiwheels configuration
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',
        ),
                'authManager'=>array(
                'class'=>'RDbAuthManager',
                'connectionID'=>'db',
               
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'site/page/<view:\w+>' => 'site/page/',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        /*'db'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        ),*/

        'db' => (!APP_DEPLOYED) ?
            array( //LOCALHOST
                'class' => 'CDbConnection',
                'connectionString' => 'mysql:host=localhost;dbname=school',
                'username' => 'root',
                'password' => '',
                'charset' => 'UTF8',
                'tablePrefix' => '', // even empty table prefix required!!!
                'emulatePrepare' => true,
                'enableProfiling' => true,
                'enableParamLogging'=>true,
                'schemaCacheID' => 'cache',
                'queryCacheID' => 'cache',
                'schemaCachingDuration' => 120
            ):
        array(       //SERVER
            'class' => 'CDbConnection',
                              'connectionString' => 'mysql:host=localhost;dbname=school',
                               'username' => 'root',
                               'password' => '',
                               'charset' => 'UTF8',
                               'tablePrefix' => '',
                               'emulatePrepare' => true,
                                'enableParamLogging'=>true,
                                'enableProfiling' => true,
                              'schemaCacheID' => 'cache',
                             'schemaCachingDuration' => 3600
                                              ),


        'errorHandler' => array(
    // use 'site/error' action to display errors
    'errorAction' => 'site/error',
),
        'log' => array(
    'class' => 'CLogRouter',
    'routes' => array(
        array(
            'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
        
        ),
        // uncomment the following to show log messages on web pages
        
      /*  array(
            'class'=>'CWebLogRoute',
        ),*/
        
    ),
),
        'clientScript' => array(
    'class' => 'CClientScript',
    'scriptMap' => array(
        //don't allow the framework to load jQuery,we load it manually,(see components/Controller.php).
        //'jquery.js' => false,
        'jquery.min.js' => false
    ),
    //'coreScriptPosition' => CClientScript::POS_END,
),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
    'fromEmail' => 'mushahidh224@gmail.com',
    'replyEmail' => 'mushahidh224@gmail.com',
    'myEmail' => 'mushahidh224@gmail.com',
    'gmail_password' => 'mianwali',
    'recaptcha_private_key' => '6LdkM_cSAAAAAH3GQvkJ9y8Wb1CQ2QSPfiLTJVCa', // captcha will not work without these keys!
    'recaptcha_public_key' => '6LdkM_cSAAAAAFHMTpOdXZ-ADvPirOyVQ0jf1bGw', //http://www.google.com/recaptcha
    'contactRequireCaptcha' => true,

    //Choose Bootswatch skin.'none' means default bootstrap theme.See http://bootswatch.com/
    //Options for Bootstrap2:(make sure you have 'theme'=>'bootstrap2' in this file.)
    //none,amelia,cerulean,cosmo,cyborg,flatly,journal,readable,simplex,slate,spacelab,spruce,superhero,united
    'bootswatch2_skin' => 'united',

    //Options for Bootstrap3:(no theme specified,default view files from protected/views are used)
    //none,amelia,cerulean,cosmo,cyborg,flatly,journal,readable,simplex,slate,spacelab,united
  'bootswatch3_skin' => 'cyborg',

    //render a form to try out layouts and skins.
    'render_switch_form' => false,
),
);