<?php
/**
 * Sina OAuth
 * @author xiaomalover <xiaomalover@gmail.com>
 */

namespace yii\authclient\clients;

use yii\authclient\OAuth2;

class SinaOAuth extends OAuth2
{
    
    public $authUrl = 'https://api.weibo.com/oauth2/authorize';
    
    public $tokenUrl = 'https://api.weibo.com/oauth2/access_token';
    
    public $apiBaseUrl = 'https://api.weibo.com';
    
    /**
     * 
     * @return []
     * @see http://open.weibo.com/wiki/Oauth2/get_token_info
     * @see http://open.weibo.com/wiki/2/users/show
     */
    protected function initUserAttributes()
    {
        return $this->api('oauth2/get_token_info', 'POST');
    }


    /**
     * get UserInfo
     * @return []
     * @see http://open.weibo.com/wiki/2/users/show
     */
    public function getUserInfo()
    {
        $openid = $this->getUserAttributes();
        return $this->api("2/users/show.json", 'GET', ['uid' => $openid['uid']]);
    }


    protected function defaultName()
    {
        return 'sina';
    }


    protected function defaultTitle()
    {
        return 'Sina';
    }

}
