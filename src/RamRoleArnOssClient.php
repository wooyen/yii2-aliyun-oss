<?php

namespace yii\aliyunoss;

use AlibabaCloud\Credentials\Credential;
use AlibabaCloud\Credentials\Credential\Config;
use OSS\OssClient;
use OSS\Credentials\StaticCredentialsProvider;

class RamRoleArnOssClient extends BaseOssClient
{
	public $roleArn;
	public $roleSessionName;
	public $policy = '';

	public function init()
	{
		parent::init();
		$credential = new Credential(new Config([
			'type' => 'ram_role_arn',
			'accessKeyId' => $this->accessKeyId,
			'accessKeySecret' => $this->accessKeySecret,
			'roleArn' => $this->roleArn,
			'roleSessionName' => $this->roleSessionName,
			'policy' => $this->policy,
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
			'region' => $this->region,
		]);
	}
}

