<?php

namespace yii\aliyunoss;

use OSS\OssClient;
use OSS\Credentials\StaticCredentialsProvider;

class StaticCredentialOssClient extends BaseOssClient
{
	public function init()
	{
		parent::init();
		$provider = new StaticCredentialsProvider($this->accessKeyId, $this->accessKeySecret);
		$this->_ossClient = new OssClient([
			'provider' => $provider,
			'endpoint' => $this->endpoint,
			'signatureVersion' => OssClient::OSS_SIGNATURE_VERSION_V4,
			'region' => $this->region,
		]);
	}

}
