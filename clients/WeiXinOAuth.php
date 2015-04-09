<?php
/**
 * WeiXin OAuth
 * @author xiaomalover <xiaomalover@gmail.com>
 */

namespace yii\authclient\clients;

use yii\authclient\OAuth2;

class WeiXinOAuth extends OAuth2
{
    
    public $authUrl = 'https://open.weixin.qq.com/connect/qrconnect';
    
    public $tokenUrl = 'https://api.weixin.qq.com/sns/oauth2/access_token';
    
    public $apiBaseUrl = 'https://api.weixin.qq.com';
    
    public $scope = 'snsapi_login';
    
    public $openid = null;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->scope === null) {
            $this->scope = implode(' ', [
                'user',
                'user:email',
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    protected function initUserAttributes()
    {
        return $this->api('user', 'GET');
    }

    /**
     * @inheritdoc
     */
    protected function defaultName()
    {
        return 'weixin';
    }

    /**
     * @inheritdoc
     */
    protected function defaultTitle()
    {
        return 'WeiXin';
    }
}
