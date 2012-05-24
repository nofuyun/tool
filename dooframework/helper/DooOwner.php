<?php

/**
 * Enter description here...
 *
 */
	class DooOwner {

		public function real_server_ip()
		{
		    static $serverip = NULL;
		    if ($serverip !== NULL)
		    {
		        return $serverip;
		    }

		    if (isset($_SERVER))
		    {
		        if (isset($_SERVER['SERVER_ADDR']))
		        {
		            $serverip = $_SERVER['SERVER_ADDR'];
		        }
		        else
		        {
		            $serverip = '0.0.0.0';
		        }
		    }
		    else
		    {
		        $serverip = getenv('SERVER_ADDR');
		    }

		    return $serverip;
		}

		function gd_version()
	    {
	        static $version = -1;

	        if ($version >= 0)
	        {
	            return $version;
	        }

	        if (!extension_loaded('gd'))
	        {
	            $version = 0;
	        }
	        else
	        {
	            // 尝试使用gd_info函数
	            if (PHP_VERSION >= '4.3')
	            {
	                if (function_exists('gd_info'))
	                {
	                    $ver_info = gd_info();
	                    preg_match('/\d/', $ver_info['GD Version'], $match);
	                    $version = $match[0];
	                }
	                else
	                {
	                    if (function_exists('imagecreatetruecolor'))
	                    {
	                        $version = 2;
	                    }
	                    elseif (function_exists('imagecreate'))
	                    {
	                        $version = 1;
	                    }
	                }
	            }
	            else
	            {
	                if (preg_match('/phpinfo/', ini_get('disable_functions')))
	                {
	                    /* 如果phpinfo被禁用，无法确定gd版本 */
	                    $version = 1;
	                }
	                else
	                {
	                  // 使用phpinfo函数
	                   ob_start();
	                   phpinfo(8);
	                   $info = ob_get_contents();
	                   ob_end_clean();
	                   $info = stristr($info, 'gd version');
	                   preg_match('/\d/', $info, $match);
	                   $version = $match[0];
	                }
	             }
	        }

	        return $version;
	     }

	     function adminMenus() {
	     	return $Menus = array(
				'公司产品管理' => array(
					array('title' => '类别管理', 'url' => 'protype'),
					array('title' => '产品管理', 'url' => 'product'),
                    array('title' => 'Deals', 'url' => 'deals'),
				),
                '用户管理' => array(
					array('title' => '用户管理', 'url' => 'userlist'),
                    array('title' => '发送微博', 'url' => 'weibo'),
				),
				'系统管理员管理' => array(
					array('title' => '添加管理员', 'url' => 'adduser'),
					array('title' => '管理员列表', 'url' => 'user'),
				),
				'全局变量' => array(
					array('title' => '全局变量', 'url' => 'globals'),
				),
			);
	     }
         /**
          * 显示信息
          * @param type $backurl
          * @param type $message
          */
         function showMessage($backurl,$message) {

             Doo::loadController('DooController');
             $dc = new DooController();
             $data = array(
                            'backurl' => $backurl,
                            'sec'     => Doo::conf()->SEC,
                            'message' => $message,
                            'rootUrl' => Doo::conf()->APP_URL,
             );
             $dc->renderc('admin/msg' , $data);
             exit;
         }

	}