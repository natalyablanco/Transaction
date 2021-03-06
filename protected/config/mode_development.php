 <?php


return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
		
        'components'=>array(
		// Asset manager
			'assetManager' => array(
				'linkAssets' => true, // publish symbolic links for easier developing
			),
            'fixture'=>array(
                'class'=>'system.test.CDbFixtureManager',
            ),
            'wunit' => array(
                        'class' => 'WUnit'
            ),
            'db'=>array(
                        'connectionString' => 'mysql:host=localhost;dbname=db_dev',
                        'emulatePrepare' => true,
                        'username' => 'root',
                        'password' => 'tupagode',
                        'charset' => 'utf8',
            ),
			/*	// Application Log
			'log' => array(
				'class' => 'CLogRouter',
				'routes' => array(
					// Save log messages on file
					array(
						'class' => 'CFileLogRoute',
						'levels' => 'error, warning, trace, info',
					),
					// Show log messages on web pages
					array(
						'class' => 'CWebLogRoute',
						//'categories' => 'system.db.CDbCommand', //queries
						'levels' => 'error, warning, trace, info',
						//'showInFireBug' => true,
					),
				),
			),*/
        ),
		'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'tupagode',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		/**/
	),
    )
);