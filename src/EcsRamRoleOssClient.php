<?php

namespace yii\aliyunoss;

use AlibabaCloud\Credentials\Credential;
use AlibabaCloud\Credentials\Credential\Config;
use OSS\OssClient;
use OSS\Credentials\StaticCredentialsProvider;

class EcsRamRoleOssClient extends BaseOssClient
{
	public $roleName;

	public function init()
	{
		parent::init();
		$credential = new Credential(new Config([
			'type' => 'ecs_ram_role',
			'roleName' => $this->roleName,
		]));
		$provider = new StaticCredentialsProvider(
			$credential->getAccessKeyId(),
			$credential->getAccessKeySecret(),
			$credential->getSecurityToken()
		);
		$this->_ossClient = new OssClient([
			'provider' => $provider,
			'endpoint' => $this->endpoint,
			'signatureVersion' => OssClient::OSS_SIGNATURE_VERSION_V4,
		]);
	}
}